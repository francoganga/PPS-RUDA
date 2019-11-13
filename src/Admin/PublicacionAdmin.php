<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Show\ShowMapper;

final class PublicacionAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('nombre')
            ->add('inicio')
            ->add('fin')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('nombre')
            ->add('persona.nombre', null, ['label' => 'Nombre'])
            ->add('persona.apellido', null, ['label' => 'Apellido'])
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
            ->add('nombre')
            ->add('persona', ModelListType::class)
            ->add('inicio')
            ->add('fin')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('nombre')
            ->add('persona.nombre', null, ['label' => 'Nombre'])
            ->add('persona.apellido', null, ['label' => 'Apellido'])
            ->add('inicio')
            ->add('fin')
            ;
    }
}
