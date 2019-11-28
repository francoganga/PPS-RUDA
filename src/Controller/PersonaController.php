<?php

namespace App\Controller;

use App\Client\Mapuche;
use App\Form\ListMembers;
use App\Form\PersonaCreate;
use App\Repository\PersonaRepository;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;
use App\Entity\Persona;
use App\Entity\Miembro;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use \Datetime;
use Psr\Log\LoggerInterface;
use App\Entity\MiembroProyecto;
use App\Repository\ActividadRepository;

class PersonaController extends CRUDController
{
    private $mapuche;
    private $logger;
    private $personaRepository;

    /**
     * @param Mapuche $mapuche
     */
    public function __construct(Mapuche $mapuche, LoggerInterface $logger, PersonaRepository $personaRepository)
    {
        $this->mapuche = $mapuche;
        $this->logger = $logger;
        $this->personaRepository = $personaRepository;
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function createPersonaAction(Request $request)
    {
        $persona = $this->admin->getSubject();

        $em = $this->getDoctrine()->getManager();

        $data = [];
        $form = $this->createFormBuilder($data)
        ->add('searchParam', TextType::class)
        ->add('Submit', SubmitType::class)
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $queryResults = $this->personaRepository->createQueryBuilder('p')
                ->select('p.id_mapuche')
                ->getQuery()
                ->getResult();
            $listaPersonas = array_map(function($inner){
                return $inner['id_mapuche'];
            }, $queryResults);

            $req = $form->getData();
            $searchParam = $req['searchParam'];

            $response = $this->mapuche->request('GET', 'agentes?nombre=contiene;'.$searchParam);
            $results = $response->getBody()->getContents();
            $normalized = json_decode($results, true);
            $res = [];
            foreach ($normalized as $value) {
                /* print_r($value['legajo'] == 144); */
                if (!in_array($value['legajo'], $listaPersonas)) {
                    array_push($res, $value);
                }
            }


            $choices = array_map(function($innArr){
                return [
                    'nombre' => $innArr['nombre'],
                    'legajo' => $innArr['legajo']
                ];
            }, $res);

            return $this->renderWithExtraParams('create.html.twig', ['object' => $persona,
                'form' => $form->createView(), 'results' => $choices
              ]);
        }

        return $this->renderWithExtraParams('create.html.twig', ['object' => $persona,
            'form' => $form->createView()
          ]);
    }
}
