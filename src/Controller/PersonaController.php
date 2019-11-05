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
    public function showInfoAction(
        FieldNameProvider $fieldNameProvider
    ) {
        $persona = $this->admin->getSubject();


        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery("SELECT a FROM App\Entity\Actividad a WHERE a.persona=:persona");

        $query->setParameter("persona", $persona);

        $actividades = $query->execute();

        $fieldDesc = $fieldNameProvider->getFieldNames($actividades);

        return $this->renderWithExtraParams('custom_show.html.twig', ['object' => $persona,
            'fieldDesc' => $fieldDesc, 'actividades' => $actividades,
          ]);
    }
}
