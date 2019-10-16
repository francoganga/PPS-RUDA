<?php

namespace App\Form\EventSubscriber;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class EditRoles implements EventSubscriberInterface
{

    /**
     * Entity Manager Service
     *
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    public static function getSubscribedEvents()
    {
        return [
            FormEvents::PRE_SUBMIT => 'onPreSubmit'
        ];
    }

    public function onPreSubmit(FormEvent $event)
    {
        $proyectoRepository = $this->em->getRepository('App\Entity\Proyecto');

        $id = $event->getForm()->getData()->getId();

        $oldData = $proyectoRepository->findOneBy([
            "id" => $id
        ]);

        foreach ($oldData->getRoles() as $rol) {
            $oldData->removeRole($rol);
        }


        $data = $event->getData();

        if (!array_key_exists('roles', $data)) {
            return;
        }

        $rolesRepository = $this->em->getRepository('App\Entity\RolProyecto');

        foreach ($data['roles'] as $rolId) {
            $rol = $rolesRepository->findOneBy([
                "id" => $rolId
            ]);
            $oldData->addRole($rol);
        }

        $this->em->persist($oldData);

        $this->em->flush();
    }
}
