<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * City
 *
 * @ORM\Table(name="city")
 * @ORM\Entity
 */
class City
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcity", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcity;

    /**
     * @var string
     *
     * @ORM\Column(name="city_name", type="string", length=45, nullable=false)
     */
    private $cityName;

    /**
     * @var \Application\Entity\State
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\State")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="state_idstate", referencedColumnName="idstate")
     * })
     */
    private $state;

    /**
     *
     * @return the integer
     */
    public function getIdcity()
    {
        return $this->idcity;
    }

    /**
     *
     * @param
     *            $idcity
     */
    public function setIdcity($idcity)
    {
        $this->idcity = $idcity;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     *
     * @param
     *            $cityName
     */
    public function setCityName($cityName)
    {
        $this->cityName = $cityName;
        return $this;
    }

    /**
     *
     * @return the integer
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     *
     * @param
     *            $state
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }
 

    
}
