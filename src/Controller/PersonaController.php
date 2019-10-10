<?php

namespace App\Controller;

use App\Entity\Persona;
use App\Entity\Miembro;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use \Datetime;
use Psr\Log\LoggerInterface;
use App\Services\FieldNameProvider;
use App\Entity\MiembroProyecto;
use App\Repository\ActividadRepository;

class PersonaController extends CRUDController
{
    /**
     * @param $id
     */
    public function showInfoAction(
        Request $request,
        $id,
        FieldNameProvider $fieldNameProvider,
        ActividadRepository $repository
    ) {
        $em = $this->getDoctrine()->getManager();
        $persona = $this->admin->getSubject();
        
          
          
        $actividades = $persona->getActividades();

          




        $fieldDesc = $fieldNameProvider->getFieldNames($actividades);


        $datosActividad = $repository->findByPersona($persona);

        dump($datosActividad);
        $result = [];
        $helper = [];

        foreach ($datosActividad as $arr) {
            foreach ($arr as $key => $value) {
                if (!is_null($value)) {
                    array_push($helper, $value);
                }
            }
        }    /* TODO: franco Recorrer el array y agrupar los datos mié 09 oct 2019 23:44:48 -03 */
        dump($result);
        dump($helper);

          

        //var_dump($actividades);die;

        return $this->renderWithExtraParams('custom_show.html.twig', ['object' => $persona,
            'fieldDesc' => $fieldDesc, 'actividades' => $actividades,
            'datosActividad' => $datosActividad
          ]);
    }
}
