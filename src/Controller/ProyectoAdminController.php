<?php

namespace App\Controller;

use App\Entity\Miembro;
use App\Entity\Persona;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use \Datetime;



class ProyectoAdminController extends CRUDController
{
	/**
     * @param $id
     */
	public function addMemberAction(Request $request)
	{	
		$em = $this->getDoctrine()->getManager();
		$proyecto = $this->admin->getSubject();

		
		$miembro = new Miembro();

		
		$form = $this->createFormBuilder($miembro)
			->add('persona', EntityType::class, ['class' => Persona::class,
			 'choice_label' => 'nombre'])
			->add('save', SubmitType::class, ['label' => 'Agregar'])
			->getForm();


		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$persona = $form->get('persona')->getData();
			$miembro->setPersona($persona);
			$now = date("Y-m-d H:i:s");
			$date = new DateTime($now);
			$miembro->setInicio($date);
			$proyecto->addMiembro($miembro);
			$em->persist($proyecto);
			$em->persist($miembro);
			$em->flush();

			return $this->redirectToRoute('admin_app_proyecto_list');
		}



		return $this->renderWithExtraParams('addMemberAction_view.html.twig', ['form' => $form->createView(),
	]);



	}





}