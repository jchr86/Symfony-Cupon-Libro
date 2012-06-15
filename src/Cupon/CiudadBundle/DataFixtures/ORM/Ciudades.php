<?php

namespace Cupon\CiudadBundle\DataFixtures\ORM;

// Cargar el fixture ordenado

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Commom\Persistence\ObjectManager;

use Cupon\CiudadBundle\Entity\Ciudad;

class Ciudades extends AbstractFixture implements OrderedFixtureInterface {
    
    public function getOrder(){
        return 1;
    }
    
    public function load(ObjectManager $manager){
        // ...
        //- demo
    }
    
}

/*
// Cargar el fixture sin orden
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Cupon\CiudadBundle\Entity\Ciudad;

class Ciudades implements FixtureInterface {
    
    public function load(ObjectManager $manager){
        $ciudades = array(
            array('nombre' => 'Madrid', 'slug' => 'madrid'),
            array('nombre' => 'Barcelona', 'slug' => 'barcelona'),
            // ...
        );
        
        foreach($ciudades as $ciudad){
            $entidad = new Ciudad();
            
            $entidad->setNombre($ciudad['nombre']);
            // $entidad->setSlug($ciudad['slug']);
            
            $manager->persist($entidad);
        }
        
        $manager->flush();
    }
    
}*/