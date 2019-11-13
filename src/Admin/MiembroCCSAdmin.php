<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Form\Type\ModelType;
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
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
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

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $em = $this->getModelManager()->getEntityManager('App\Entity\RolCCS');

        $query = $em->createQuery(
            'SELECT r FROM App\Entity\RolCCS r JOIN r.comisionesCS c WHERE c.id=:cid'
        );

        $comisionId = $this->getSubject()->getComisionConsejoSuperior()->getId();

        $query->setParameter('cid', $comisionId);
        $formMapper
            ->add('persona', ModelListType::class)
            ->add('rol', ModelType::class, [
                'class' => 'App\Entity\RolCCS',
                'btn_add' => false,
                'query' => $query
            ])
            ->add('inicio')
            ->add('fin')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('persona.nombre', null, ['label' => 'Nombre'])
            ->add('persona.apellido', null, ['label' => 'Apellido'])
            ->add('inicio')
            ->add('fin')
            ;
    }
}
