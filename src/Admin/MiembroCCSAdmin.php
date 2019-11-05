<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Show\ShowMapper;

final class MiembroCCSAdmin extends AbstractAdmin
{
    /**
     * Eliminar rutas base
     * Mantener solo las generadas
     * a partir del padre
     *
     * @return void
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        if ($this->isChild()) {
            return;
        }

        $collection->clear();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('inicio')
            ->add('fin')
            ->add('deletedAt')
            ->add('createdAt')
            ->add('updatedAt')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('persona.nombre')
            ->add('persona.apellido')
            ->add('inicio')
            ->add('fin')
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
            ->add('persona', ModelListType::class)
            ->add('inicio')
            ->add('fin')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('persona.nombre')
            ->add('persona.apellido')
            ->add('inicio')
            ->add('fin')
            ;
    }
}
