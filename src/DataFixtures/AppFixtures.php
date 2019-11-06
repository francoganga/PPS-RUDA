<?php

namespace App\DataFixtures;

use App\Entity\ComisionConsejoSuperior;
use App\Entity\DirectorCarrera;
use App\Entity\MiembroCCS;
use App\Entity\MiembroPPS;
use App\Entity\PPS;
use App\Entity\Persona;
use App\Entity\Instituto;
use App\Entity\ProyectoExtension;
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
        for ($i=0; $i < 10; $i++) {
            $persona = new Persona();
            $persona->setNombre($faker->firstName);
            $persona->setApellido($faker->lastName);
            $manager->persist($persona);
        }






        for ($a=0; $a < 5; $a++) {
            $proyecto = new ProyectoInvestigacion();
            $proyecto->setNombre($faker->word);
            $manager->persist($proyecto);
        }

        /**
         * Crear persona con muchas actividades
         */
        $persona = new Persona();
        $persona->setNombre("Test");
        $persona->setApellido("persona");

        for ($i = 0; $i < 2; $i++) {
            $proyectoExtension = new ProyectoExtension();
            $proyectoExtension->setNombre($faker->word);
            $miembroProyecto = new MiembroProyecto();
            $now = date('Y-m-d');
            $dateTime = new DateTime($now);
            $miembroProyecto->setInicio($dateTime);
            $miembroProyecto->setPersona($persona);
            $miembroProyecto->setProyecto($proyectoExtension);
            $manager->persist($proyectoExtension);
            $manager->persist($miembroProyecto);
        }

        $coordinadorMateria = new CoordinadorMateria();

        $now = $this->dateNow();
        $coordinadorMateria->setInicio($now);
        $coordinadorMateria->setPersona($persona);
        $materia = new Materia();
        $materia->setNombre($faker->word);
        $coordinadorMateria->setMateria($materia);
        $manager->persist($coordinadorMateria);
        $manager->persist($materia);

        $directorCarrera = new DirectorCarrera();
        $directorCarrera->setPersona($persona);
        $directorCarrera->setInicio($now);
        $carrera = new Carrera();
        $carrera->setNombre($faker->word);

        $directorCarrera->setCarrera($carrera);

        $pps = new PPS();
        $pps->setNombre("RUDA");

        $miembroPPS = new MiembroPPS();
        $miembroPPS->setPersona($persona);
        $miembroPPS->setPps($pps);
        $miembroPPS->setInicio($now);

        $miembroCCS = new MiembroCCS();
        $ccs = new ComisionConsejoSuperior();
        $ccs->setNombre($faker->word);

        $miembroCCS->setPersona($persona);
        $miembroCCS->setInicio($now);
        $miembroCCS->setComisionConsejoSuperior($ccs);

        $manager->persist($miembroCCS);
        $manager->persist($ccs);
        $manager->persist($pps);
        $manager->persist($miembroPPS);
        $manager->persist($directorCarrera);
        $manager->persist($carrera);

        $manager->persist($persona);

        $manager->flush();
    }

    /**
     * Returns current time as DateTime
     *
     * @return DateTime
     */
    public static function dateNow()
    {
        $now = date('Y-m-d');

        return new DateTime($now);
    }
}
