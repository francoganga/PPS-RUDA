<?php

namespace App\Form;

use App\Entity\MiembroProyecto;
use App\Entity\RolProyecto;
use Symfony\Component\Form\AbstractType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListMembers extends AbstractType 
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('miembros', ModelType::class, [
                'model_manager' => $this->container->get('sonata.admin.manager.orm'),
                'property' => 'persona.nombre',
                'class' => MiembroProyecto::class,
                'multiple' => true,
            ])
            ->add('rol', ModelType::class, [
                'model_manager' => $this->container->get('sonata.admin.manager.orm'),
                'property' => 'nombre',
                'class' => RolProyecto::class,
            ])
            ->add('Asignar', SubmitType::class)
            ;
    }

}