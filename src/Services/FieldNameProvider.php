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
            $actividadMetadata = $metadataFactory->getMetadataFor(get_class($entity));
            $field = $actividadMetadata->getTableName();

            if (!array_key_exists($field, $this->fieldNames)) {
                $msg = "La etiqueta para el campo <".$field."> no esta definida.\n";
                $msg .= "Agregar la etiqueta en App\Config\FieldNames.php";
                throw new Exception($msg);
            }

            array_push($fieldNamesArray, $this->fieldNames[$field]);
        }


        return $fieldNamesArray;
    }
}
