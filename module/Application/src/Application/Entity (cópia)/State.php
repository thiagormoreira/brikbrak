<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * State
 *
 * @ORM\Table(name="state")
 * @ORM\Entity
 */
class State
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idstate", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idstate;

    /**
     * @var string
     *
     * @ORM\Column(name="state_name", type="string", length=45, nullable=false)
     */
    private $stateName;

    /**
     * @var string
     *
     * @ORM\Column(name="uf", type="string", length=5, nullable=true)
     */
    private $uf;

    /**
     * @var integer
     *
     * @ORM\Column(name="country_idcountry", type="integer", nullable=false)
     */
    private $country;

    /**
     *
     * @return the integer
     */
    public function getIdstate()
    {
        return $this->idstate;
    }

    /**
     *
     * @param
     *            $idstate
     */
    public function setIdstate($idstate)
    {
        $this->idstate = $idstate;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getStateName()
    {
        return $this->stateName;
    }

    /**
     *
     * @param
     *            $stateName
     */
    public function setStateName($stateName)
    {
        $this->stateName = $stateName;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     *
     * @param
     *            $uf
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
        return $this;
    }

    /**
     *
     * @return the integer
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     *
     * @param
     *            $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }
 

    
}
