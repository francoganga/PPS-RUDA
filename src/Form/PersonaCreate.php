<?php

namespace App\Form;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class PersonaCreate extends AbstractType
{
    private $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Busqueda', TextType::class)
            ->add('Buscar', SubmitType::class)
            ;
    }
}
