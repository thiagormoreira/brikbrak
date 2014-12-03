<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Option
 *
 * @ORM\Table(name="option")
 * @ORM\Entity
 */
class Option
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idoption", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idoption;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gear", type="boolean", nullable=true)
     */
    private $gear;

    /**
     *
     * @return the integer
     */
    public function getIdoption()
    {
        return $this->idoption;
    }

    /**
     *
     * @param
     *            $idoption
     */
    public function setIdoption($idoption)
    {
        $this->idoption = $idoption;
        return $this;
    }

    /**
     *
     * @return the boolean
     */
    public function getGear()
    {
        return $this->gear;
    }

    /**
     *
     * @param
     *            $gear
     */
    public function setGear($gear)
    {
        $this->gear = $gear;
        return $this;
    }
 

    
}
