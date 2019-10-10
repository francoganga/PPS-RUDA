<?php

namespace App\DataFixtures;

use App\Entity\Persona;
use App\Entity\Instituto;
use App\Entity\ProyectoInvestigacion;
use App\Entity\Carrera;
use App\Entity\Materia;
use App\Entity\MiembroProyecto;
use App\Entity\CoordinadorMateria;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use \Datetime;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	$faker = Factory::create();

        for ($i=0; $i < 5; $i++) { 
            $carrera = new Carrera();
            $carrera->setNombre($faker->word);
            $manager->persist($carrera);
        }
        
        for ($i=0; $i < 5; $i++) { 
            $materia = new Materia();
            $materia->setNombre($faker->word);
            $manager->persist($materia);
        }

    	$instituto = new Instituto();
    	$instituto->setNombre($faker->firstName);
    	$manager->persist($instituto);
        for ($i=0; $i < 10 ; $i++) { 
        	$persona = new Persona();
        	$persona->setNombre($faker->firstName);
            $persona->setApellido($faker->lastName);
        	$manager->persist($persona);
        }

        
        
        


        for ($a=0; $a < 5 ; $a++) { 
            $proyecto = new ProyectoInvestigacion();
            $proyecto->setNombre($faker->word);
            $manager->persist($proyecto);
            
        }

        
        


        $manager->flush();
    }
}
