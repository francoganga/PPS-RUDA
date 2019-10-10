<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Config\Definition\Exception\Exception;

class FieldNameProvider
{
    private $fieldNames;
    private $em;


    public function __construct(EntityManagerInterface $em)
    {
        $this->fieldNames = include('../config/FieldNames.php');
        $this->em = $em;
    }

    public function getFieldNames($entities)
    {
        $metadataFactory = $this->em->getMetadataFactory();

        $fieldNamesArray = array();

        

        foreach ($entities as $entity) {
            $actividad_metadata = $metadataFactory->getMetadataFor(get_class($entity));
            $field = $actividad_metadata->getTableName();

            if (array_key_exists($field, $this->fieldNames)) {
                array_push($fieldNamesArray, $this->fieldNames[$field]);
            } else {
                throw new Exception("El indice <".$field."> no esta definido.\nAgregar
                    la etiqueta en App\Config\FieldNames.php");
                exit(1);
            }
        }


        return $fieldNamesArray;
    }
}
