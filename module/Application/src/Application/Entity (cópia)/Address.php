<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity
 */
class Address
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idaddress", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idaddress;

    /**
     * @var string
     *
     * @ORM\Column(name="address_allias", type="string", length=45, nullable=true)
     */
    private $addressAllias;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=45, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="district_name", type="string", length=45, nullable=true)
     */
    private $districtName;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=10, nullable=true)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="complement", type="string", length=45, nullable=true)
     */
    private $complement;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Application\Entity\User", mappedBy="addressaddress")
     */
    private $user;

    /**
     * @var \Application\Entity\TypeAddress
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\TypeAddress", inversedBy="useruser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_address_idtype_address", referencedColumnName="idtype_address")
     * })
     */
    private $typeAddress;

    /**
     * @var \Application\Entity\City
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\City")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city_idcity", referencedColumnName="idcity")
     * })
     */
    private $city;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     *
     * @return the integer
     */
    public function getIdaddress()
    {
        return $this->idaddress;
    }
    public function getId()
    {
        return $this->idaddress;
    }

    /**
     *
     * @param
     *            $idaddress
     */
    public function setIdaddress($idaddress)
    {
        $this->idaddress = $idaddress;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getAddressAllias()
    {
        return $this->addressAllias;
    }

    /**
     *
     * @param
     *            $addressAllias
     */
    public function setAddressAllias($addressAllias)
    {
        $this->addressAllias = $addressAllias;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     *
     * @param
     *            $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     *
     * @param
     *            $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     *
     * @param
     *            $complement
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;
        return $this;
    }

    /**
     *
     * @return the boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     *
     * @param
     *            $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     *
     * @return the Collection
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     *
     * @param
     *            $user
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     *
     * @return the TypeAddress
     */
    public function getTypeAddress()
    {
        return $this->typeAddress;
    }

    /**
     *
     * @param
     *            $typeAddress
     */
    public function setTypeAddress($typeAddress)
    {
        $this->typeAddress = $typeAddress;
        return $this;
    }

    /**
     *
     * @return the City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     *
     * @param
     *            $city
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getDistrictName()
    {
        return $this->districtName;
    }

    /**
     *
     * @param string $districtName            
     */
    public function setDistrictName(string $districtName)
    {
        $this->districtName = $districtName;
        return $this;
    }
 
 
}
