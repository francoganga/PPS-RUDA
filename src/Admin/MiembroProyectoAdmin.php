<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Sonata\Form\Validator\ErrorElement;

final class MiembroProyectoAdmin extends AbstractAdmin
{
    use AdminTrait;

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


    protected function configureFormFields(FormMapper $formMapper): void
    {

        $em = $this->getModelManager()->getEntityManager('App\Entity\RolProyecto');

        $query = $em->createQuery(
            "SELECT r FROM App\Entity\RolProyecto r JOIN r.proyectos p WHERE p.id=:pid"
        );
        $proyecto = $this->getSubject()->getProyecto();

        $query->setParameter("pid", $proyecto->getId());

        $formMapper
            ->add('persona', ModelListType::class)
            ->add('rol', ModelType::class, [
                "query" => $query,
                "btn_add" => false
            ])
            ->add('inicio', DatePickerType::class)
            ->add('fin', DatePickerType::class)
            ;
    }
}
