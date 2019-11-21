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
     * Luego se llama a cada setter de las propiedades en persona
     * iterando sobre las keys de la respuesta de mapuche.
     * por cada key ejecutar $persona->set{key capitalizada}(parametro=respuesta de mapuche[key])
     *
     * @return void
     */
    public function postLoad(Persona $persona, LifecycleEventArgs $args)
    {

        $response = $this->mapuche->request('GET', 'agentes/'.$persona->getIdMapuche());
        $code = $response->getStatusCode();

        if ($code != 200) {
            return;
        }

        $results = $response->getBody()->getContents();
        $normalizedResults = json_decode($results, true);

        $fields = array_keys($normalizedResults);

        for ($i = 1; $i < sizeof($fields); $i++) { /* Se recorre todas las key de la respuesta de mapuche*/
            $capitalizedValue = ucfirst($fields[$i]); /* Capitalizacion para setters en entidad asi el metodo queda de forma camelcase */
            call_user_func([$persona, 'set'.$capitalizedValue], $normalizedResults[$fields[$i]]); /* Se llama a cada setter de Persona*/
        }
    }
}
