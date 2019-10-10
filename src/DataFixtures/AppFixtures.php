<?php

namespace App\DataFixtures;

use App\Entity\Persona;
use App\Entity\Instituto;
use App\Entity\ProyectoInvestigacion;
use App\Entity\Carrera;
use App\Entity\Materia;
use App\Entity\MiembroProyecto;
use App\Entity\CoordinadorMateria;
use App\Entity\MiembroProyectoRol;
use App\Entity\RolProyecto;
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
            $miembro = new MiembroProyecto();
            $now = date("Y-m-d H:i:s");
            $date = new DateTime($now);
            $miembro->setInicio($date);
            $miembro->setPersona($persona);
        	$manager->persist($persona);
        	$manager->persist($miembro);
        }

        
        $rol = new RolProyecto();
        $rol->setNombre('Investigador');
        $persona = new Persona();
        $persona->setNombre('testProyectos');
        $persona->setApellido('tests');
        $miembro = new MiembroProyecto();
        $miembro->setPersona($persona);
        $now = date("Y-m-d H:i:s");
        $date = new DateTime($now);
        $miembro->setInicio($date);
        $manager->persist($persona);


        for ($a=0; $a < 5 ; $a++) { 
            $proyecto = new ProyectoInvestigacion();
            $mpr = new MiembroProyectoRol();
            $proyecto->setNombre($faker->word);
            $mpr->setMiembro($miembro);
            $mpr->setProyecto($proyecto);
            $mpr->setRol($rol);
            $manager->persist($proyecto);
            $manager->persist($miembro);
            $manager->persist($rol);
            $manager->persist($mpr);
        }

        
        


        $manager->flush();
    }
}
