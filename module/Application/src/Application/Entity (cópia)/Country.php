<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity
 */
class Country
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcountry", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="country_name", type="string", length=60, nullable=false)
     */
    private $countryName;

    /**
     * @var string
     *
     * @ORM\Column(name="sigla", type="string", length=10, nullable=true)
     */
    private $sigla;

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

    /**
     *
     * @return the string
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     *
     * @param
     *            $countryName
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getSigla()
    {
        return $this->sigla;
    }

    /**
     *
     * @param
     *            $sigla
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;
        return $this;
    }
 

    
}
