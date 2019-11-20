<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\Form\Type\DatePickerType;

final class DirectorCarreraAdmin extends AbstractAdmin
{
    use AdminTrait;

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->add('persona', ModelListType::class)
            ->add('carrera', ModelType::class, ['btn_add' => false])
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
            ->add('carrera')
            ;
    }
}
