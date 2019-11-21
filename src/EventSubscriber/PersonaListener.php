<?php

namespace App\EventSubscriber;

use App\Client\Mapuche;
use App\Entity\Persona;
use Doctrine\ORM\Event\LifecycleEventArgs;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class PersonaListener
{
    /**
     * @param Mapuche $mapuche
     */
    public function __construct(Mapuche $mapuche)
    {
        $this->mapuche = $mapuche;
    }

    /**
     * Http request a API, luego que se carga el objeto persona.
     *
     * @return void
     */
    public function postLoad(Persona $persona, LifecycleEventArgs $args)
    {
        $response = $this->mapuche->request('GET', 'agentes/'.$persona->getLegajo());
        $results = $response->getBody()->getContents();
        $normResults = json_decode($results, true);

        $deletedValues = [
            'legajo',
            'agente',
            'desc_apmat',
            'documento',
            'cuil',
            'estado',
            'descripcion_estado',
            'datos_combo',
            'fecha_jubilacion',
            'fecha_ingreso'
        ];

        foreach ($deletedValues as $value) {
            unset($normResults[$value]);
        }

        $persona->setDatosMapuche($normResults);

    }
}
