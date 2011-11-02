<?php
namespace Opensegovia\GestorTiempoBundle\Entity;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping as ORM;

/**
 * Opensegovia\GestorTiempo\Entity\Proyecto
 * 
 * @ORM\Table(name = "Proyecto")
 * @ORM\Entity
 */
class Proyecto{
	
	
	/**
	 * @var int id
	 * 
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @var string nombre
	 * 
	 * @ORM\Column(name="nombre", type="string")
	 */
	private $nombre;
	/**
	 * @var datetime fechaEntrega
	 * 
	 * @ORM\Column(name="fecha_entrega", type="datetime")
	 */
	private $fechaEntrega;
	/**
	 * @var float  horasAcumuladas
	 * 
	 * @ORM\Column(name="horasAcumuladas", type="float" )
	 */
	private $horasAcumuladas;

	/**
	 * @ORM\OneToMany(targetEntity="Reporte", mappedBy="proyecto")
	 */
	private $reportes;
	
	public function __construct(){
		$this->reportes = new \Doctrine\Common\Collections\ArrayCollection();
	}
	
	/**
     * __toString()
     * 
     * @return String 
     */
	public function __toString(){
		return $this->getNombre();
	}
	
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set fechaEntrega
     *
     * @param datetime $fechaEntrega
     */
    public function setFechaEntrega($fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;
    }

    /**
     * Get fechaEntrega
     *
     * @return datetime 
     */
    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

    /**
     * Set horasAcumuladas
     *
     * @param float $horasAcumuladas
     */
    public function setHorasAcumuladas($horasAcumuladas)
    {
        $this->horasAcumuladas = $horasAcumuladas;
    }

    /**
     * Get horasAcumuladas
     *
     * @return float 
     */
    public function getHorasAcumuladas()
    {
        return $this->horasAcumuladas;
    }

    /**
     * Add reportes
     *
     * @param Opensegovia\GestorTiempoBundle\Entity\Reporte $reportes
     */
    public function addReporte(\Opensegovia\GestorTiempoBundle\Entity\Reporte $reportes)
    {
        $this->reportes[] = $reportes;
    }

    /**
     * Get reportes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getReportes()
    {
        return $this->reportes;
    }
}
