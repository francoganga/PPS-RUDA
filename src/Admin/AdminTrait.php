<?php

namespace App\Admin;

use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Sonata\Form\Validator\ErrorElement;
use Sonata\AdminBundle\Route\RouteCollection;

trait AdminTrait
{
    public function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('inicio')
            ->add('fin')
            ;
    }

    public function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
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

    public function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->add('persona', ModelListType::class)
            ->add('inicio', DatePickerType::class)
            ->add('fin', DatePickerType::class)
            ;
    }

    public function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('persona.nombre', null, ['label' => 'Nombre'])
            ->add('persona.apellido', null, ['label' => 'Apellido'])
            ->add('inicio')
            ->add('fin')
            ;
    }

    public function validate( ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('persona')
               ->assertNotBlank()
            ->end()
            ;
    }
}
