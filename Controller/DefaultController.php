<?php

namespace Opensegovia\GestorTiempoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Opensegovia\GestorTiempoBundle\Entity\Proyecto;
use Opensegovia\GestorTiempoBundle\Entity\Reporte;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
		$proyecto = new Proyecto();
		$proyecto->setNombre($name);
		$proyecto->setFechaEntrega(new \DateTime("now"));
		$proyecto->setHorasAcumuladas(0);
		
		$em = $this->getDoctrine()->getEntityManager();
		$em->persist($proyecto);
		$em->flush();
		
        return array('name' => $name);
    }
}
