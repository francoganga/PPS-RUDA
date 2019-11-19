<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\CoreBundle\Form\Type\DatePickerType;

final class DirectorInstitutoAdmin extends AbstractAdmin
{
    use AdminTrait;

    public function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->add('persona', ModelListType::class)
            ->add('instituto', ModelType::class)
            ->add('inicio', DatePickerType::class)
            ->add('fin', DatePickerType::class)
            ;
    }
}
