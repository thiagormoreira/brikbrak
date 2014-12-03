<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application\Entity\User;

/**
 * Advertising
 *
 * @ORM\Table(name="advertising")
 * @ORM\Entity
 */
class Advertising
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idadvertising", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idadvertising;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    private $text;

    /**
     * @var \Application\Entity\Address
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Address")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="address_idaddress", referencedColumnName="idaddress")
     * })
     */
    private $address;

    /**
     * @var \Application\Entity\Car
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Car")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="car_idcar", referencedColumnName="idcar")
     * })
     */
    private $car;

    /**
     * @var \Application\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\User", fetch="EXTRA_LAZY")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_user_id", referencedColumnName="user_id")
     * })
     */
    public $user;

    /**
     * @var \Application\Entity\Cart
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Cart")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cart_cart_id", referencedColumnName="cart_id")
     * })
     */
    private $cart;

    /**
     *
     * @return integer
     */
    public function getIdadvertising()
    {
        return $this->idadvertising;
    }

    /**
     *
     * @param
     *            $idadvertising
     */
    public function setIdadvertising($idadvertising)
    {
        $this->idadvertising = $idadvertising;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     *
     * @param
     *            $text
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     *
     * @return Address
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
     * @return Car
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     *
     * @param
     *            $car
     */
    public function setCar($car)
    {
        $this->car = $car;
        return $this;
    }

    /**
     *
     * @return User
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
     * @return Cart
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     *
     * @param
     *            $cart
     */
    public function setCart($cart)
    {
        $this->cart = $cart;
        return $this;
    }
 
    /**
     * Constructor
     */
    public function __construct()
    {
        //$this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
}
