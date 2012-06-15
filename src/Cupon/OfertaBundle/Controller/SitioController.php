<?php

namespace Cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @author JCHR
 */
class SitioController extends Controller {
    
    public function estaticaAction($pagina){
        return $this->render('OfertaBundle:Sitio:' . $pagina . '.html.twig');
    }
    
}

?>
