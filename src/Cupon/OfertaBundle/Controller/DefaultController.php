<?php

namespace Cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Cupon\OfertaBundle\Entity\Oferta;

class DefaultController extends Controller
{
    
    /*public function indexAction($name)
    {
        return $this->render('OfertaBundle:Default:index.html.twig', array('name' => $name));
    }*/
    
    /*public function ayudaAction(){
        //return new Response('Ayuda');
        
        return $this->render('OfertaBundle:Default:ayuda.html.twig');
    }*/
    
    public function portadaAction($ciudad){
        // Entity Manager
        $em = $this->getDoctrine()->getEntityManager();
        
        // Buscar la oferta 1
        $oferta = $em->find('OfertaBundle:Oferta', 1);
        $precio = $oferta->getPrecio();
        
        $oferta = $em->getRepository('OfertaBundle:Oferta')->find(1);
        
        // Obetener todas las filas de una tabla
        $ofertas = $em->getRepository('OfertaBundle:Oferta')->findAll();
        
        // Encontrar todas las ofertas revisadas
        $ofertasRevisadas = $em->getRepository('OfertaBundle:Oferta')->findBy(array(
            'revisada' => true
        ));
        # Alternativa
        $ofertasRevisadas = $em->getRepository('OfertaBundle:Oferta')
                               ->findByRevisada(true);
        
        // Encontrar la ciudad de Victoria-Gasteiz
        $ciudad = $em->getRepository('CiudadBundle:Ciudad')->findOneBy(array(
            'slug' => 'victoria-gasteiz'
        ));
        # Alternativa
        $ciudad = $em->getRepository('CiudadBundle:Ciudad')
                      ->findOneBySlug('victoria-gasteiz');
        
        // Encontrar usuarios de Victoria-Gasteiz
        $usuarios = $em->getRepository('UsuarioBundle:Usuario')->findBy(array(
            'ciudad'        => $ciudad->getId(),
            'permite_email' => true
        ));
        
        // Mostrar el nombre de los usuarios encontrados
        foreach($usuarios as $usuario){
            echo $usuario->getCiudad()->getNombre();
        }
        
    }
    
    public function testAddAction(){
        $oferta = new Oferta();
        
        $oferta->setNombre('Lorem Ipsum ...');
        $oferta->setPrecio(10.99);
        // ...
        
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($oferta);
        $em->flush();
    }
    
    public function testUpdateAction(){
        $em = $this->getDoctrine()->getEntityManager();
        $oferta = $em->getRepository('OfertaBundle:Oferta')->find(3);
        
        $oferta->setPrecio($oferta->getPrecio() + 5);
        
        $em->persist($oferta);
        $em->flush();
    }
    
    public function testRemoveAction(){
        $em = $this->getDoctrine()->getEntityManager();
        
        $usuario = $em->getRepository('UsuarioBundle:Usuario')->findOneByDni('1234567L');
        
        $em->remove($usuario);
        $em->flush();
    }
    
}
