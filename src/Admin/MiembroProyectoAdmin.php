<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\Form\Validator\ErrorElement;

final class MiembroProyectoAdmin extends AbstractAdmin
{
    /**
     * Entity manager injection
     *
     * @var EntityManagerInterface
     */
    private $entityManager;

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('persona.nombre', null, ['label' => 'Nombre'])
            ->add('persona.apellido', null, ['label' => 'Apellido'])
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
        $query = $this->entityManager->createQuery(
            "SELECT r FROM App\Entity\RolProyecto r where r.proyecto =:proyecto"
        );
        $query->setParameter("proyecto", $this->getParent()->getSubject());

        $formMapper
            ->add('persona', ModelListType::class)
            ->add('rol', ModelType::class, [
                "query" => $query,
                "btn_add" => false
            ])
            ->add('inicio')
            ->add('fin')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('persona.nombre')
            ->add('persona.apellido')
            ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('rol')
                ->assertNotNull()
                ->assertNotBlank()
            ->end();
    }

    /**
     * Inicializa el EntityManager
     *
     * @return self
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }
}
