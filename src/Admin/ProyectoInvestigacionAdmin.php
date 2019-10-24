<?php

declare(strict_types=1);

namespace App\Admin;

use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;

final class ProyectoInvestigacionAdmin extends AbstractAdmin
{
    /**
     * Event Subscriber
     *
     * @var EventSubscriberInterface
     */
    private $eventSubscriber;

    /**
     * Agrega un event subscriber 
     *
     * @return self
     */
    public function setEventSubscriber($eventSubscriber)
    {
        $this->eventSubscriber = $eventSubscriber;
        return $this;
    }
    

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('nombre')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('nombre')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->add('nombre')
            ->add('roles', ModelType::class, [
                'class' => "App\Entity\RolProyecto",
                'multiple' => true
            ]);
        $formMapper->getFormBuilder()->addEventSubscriber($this->eventSubscriber);
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->with('Persona')
            ->add('nombre')
            ->end()
            ;
    }

    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        if (!$childAdmin && !in_array($action, ['edit', 'show'])) {
            return;
        }

        $admin = $this->isChild() ? $this->getParent() : $this;
        $id = $admin->getRequest()->get('id');

        $menu->addChild('Ver Proyecto', [
            'uri' => $admin->generateUrl('show', ['id' => $id])
        ]);

        if ($this->isGranted('EDIT')) {
            $menu->addChild('Editar Proyecto', [
                'uri' => $admin->generateUrl('edit', ['id' => $id])
            ]);
        }

        if ($this->isGranted('LIST')) {
            $menu->addChild('Administrar Miembros', [
                'uri' => $admin->generateUrl('admin.miembro_proyecto.list', ['id' => $id])
            ]);
        }
    }
}
