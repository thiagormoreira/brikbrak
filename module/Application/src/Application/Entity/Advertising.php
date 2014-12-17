<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application\Entity\User;
use Application\Entity\Item;
use Application\Entity\Contact;

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
     * @var \Application\Entity\Item
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="item_iditem", referencedColumnName="iditem")
     * })
     */
    private $item;

    /**
     * @var \Application\Entity\Contact
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Contact")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contact_idcontact", referencedColumnName="idcontact")
     * })
     */
    private $contact;

    /**
     * @var \Application\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_user_id", referencedColumnName="user_id")
     * })
     */
    public $user;
    
    /**
     * @var string
     *
     * @ORM\Column(name="view_count", type="integer", nullable=true)
     */
    private $viewCount;
    
    /**
     * @var string
     *
     * @ORM\Column(name="create_date", type="datetime", nullable=true)
     */
    private $createDate;

    /**
     *
     * @return integer
     */
    public function getIdadvertising()
    {
        return $this->idadvertising;
    }
    public function getId()
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

        if (!is_callable($this->zfcUserAuthentication())) {
            return $this->redirect()->toRoute('authenticate');
        }
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
     * @return Item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     *
     * @param
     *            $item
     */
    public function setItem($item)
    {
        $this->item = $item;
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
     * Constructor
     */
    public function __construct()
    {
        //$this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     *
     * @return the string
     */
    public function getViewCount()
    {
        return $this->viewCount;
    }

    /**
     *
     * @param string $viewCount            
     */
    public function addViewCount()
    {
        $this->viewCount = $this->viewCount + 1;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     *
     * @return the Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     *
     * @param
     *            $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
        return $this;
    }
 
 
    
}
