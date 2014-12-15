<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="display_name", type="string", length=45, nullable=true)
     */
    private $displayName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="state", type="boolean", nullable=true)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=60, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=true)
     */
    private $username;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Application\Entity\Address", inversedBy="useruser")
     * @ORM\JoinTable(name="user_has_address",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_iduser", referencedColumnName="user_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="address_idaddress", referencedColumnName="idaddress")
     *   }
     * )
     */
    private $address;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Application\Entity\Contact", inversedBy="useruser")
     * @ORM\JoinTable(name="user_has_contact",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_iduser", referencedColumnName="user_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="contact_idcontact", referencedColumnName="idcontact")
     *   }
     * )
     */
    private $contact;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Application\Entity\HistoryAccess", inversedBy="useruser")
     * @ORM\JoinTable(name="user_has_history_access",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_iduser", referencedColumnName="user_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="history_access_idhistory_access", referencedColumnName="idhistory_access")
     *   }
     * )
     */
    //private $historyAccess;

    /**
     * @var \Application\Entity\Role
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_idrole", referencedColumnName="idrole")
     * })
     */
    private $role;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->address = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contact = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     *
     * @return the integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     *
     * @param
     *            $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     *
     * @param
     *            $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     *
     * @param
     *            $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     *
     * @return the boolean
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

    /**
     *
     * @return the string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     *
     * @param
     *            $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     *
     * @param
     *            $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     *
     * @return the Collection
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
     * @return the Collection
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

    /**
     *
     * @return the Collection
     */
    public function getHistoryAccess()
    {
        return $this->historyAccess;
    }

    /**
     *
     * @param
     *            $historyAccess
     */
    public function setHistoryAccess($historyAccess)
    {
        $this->historyAccess = $historyAccess;
        return $this;
    }

    /**
     *
     * @return the Collection
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     *
     * @param
     *            $role
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     *
     * @return the integer
     */
    public function getId()
    {
        return $this->userId;
    }

    /**
     *
     * @param
     *            $userId
     */
    public function setId($userId)
    {
        $this->userId = $userId;
        return $this;
    }
 
}
