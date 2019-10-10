<?php

namespace App\Controller;

use App\Entity\MiembroProyecto;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ListMembers;
use App\Services\ProyectoManager;
use Knp\Menu\MenuFactory;



class ProyectoExtensionAdminController extends CRUDController
{
	/**
     * @param $id
     */
	public function asignarAction(Request $request, ProyectoManager $proyectoManager, $id)
	{	
		$proyecto = $this->admin->getSubject();


		$factory = new MenuFactory();
		$menu = $factory->createItem('Menu', ['class' => 'nav navbar-nav navbar-right']);
		$menu->addChild('Ver Proyecto', [
            'uri' => $this->admin->generateUrl('show', ['id' => $id])
		]);
		if ($this->admin->isGranted('EDIT')) {
            $menu->addChild('Editar Proyecto', [
                'uri' => $this->admin->generateUrl('edit', ['id' => $id])
            ]);
        }
		if ($this->admin->isGranted('LIST')) {
            $menu->addChild('Administrar Miembros', [
                'uri' => $this->admin->generateUrl('admin.miembro_proyecto.list', ['id' => $id])
            ]);
        }
		$menu->setChildrenAttribute('class', 'nav navbar-nav navbar-right');
		


		$form = $this->createForm(ListMembers::class);



		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$miembros = $form->get('miembros')->getData();
			$rol = $form->get('rol')->getData();

			$proyectoManager->asignarMiembros($miembros, $proyecto, $rol);

			

			
			return new RedirectResponse($this->admin->generateUrl('admin.miembro_proyecto.list', ['id' => $id]));
			
		}

		return $this->renderWithExtraParams('asignar.html.twig', ['form' => $form->createView(),
		'admin' => $this->admin, 'object' => $proyecto, 'action' => 'asignar', 'menu' => $menu,
	]);

	}

}