<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity
 */
class Message
{
    /**
     * @var integer
     *
     * @ORM\Column(name="message_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmessage;
 
    /**
     * @var string
     *
     * @ORM\Column(name="contact_name", type="string", length=45, nullable=true)
     */
    private $contactName;
 
    /**
     * @var string
     *
     * @ORM\Column(name="contact_email", type="string", length=45, nullable=true)
     */
    private $contactEmail;
 
    /**
     * @var string
     *
     * @ORM\Column(name="contact_tel", type="string", length=45, nullable=true)
     */
    private $contactTel;
 
    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", nullable=true)
     */
    private $message;
 
    /**
     * @var string
     *
     * @ORM\Column(name="create_date", type="datetime", nullable=true)
     */
    private $createDate;
    
    /**
     * @var \Application\Entity\Advertising
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Advertising")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="advertising_idadvertising", referencedColumnName="idadvertising")
     * })
     */
    private $advertising;
    
    /**
     * @var \Application\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_user_id", referencedColumnName="user_id")
     * })
     */
    private $user;

    /**
     *
     * @return the integer
     */
    public function getIdmessage()
    {
        return $this->idmessage;
    }
    public function getId()
    {
        return $this->idmessage;
    }

    /**
     *
     * @param integer $idmessage            
     */
    public function setIdmessage($idmessage)
    {
        $this->idmessage = $idmessage;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     *
     * @param string $contactName            
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     *
     * @param string $contactEmail            
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getContactTel()
    {
        return $this->contactTel;
    }

    /**
     *
     * @param string $contactTel            
     */
    public function setContactTel($contactTel)
    {
        $this->contactTel = $contactTel;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     *
     * @param string $message            
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     *
     * @return the Advertising
     */
    public function getAdvertising()
    {
        return $this->advertising;
    }

    /**
     *
     * @param
     *            $advertising
     */
    public function setAdvertising($advertising)
    {
        $this->advertising = $advertising;
        return $this;
    }

    /**
     *
     * @return the User
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
     * @return the string
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     *
     * @param string $createDate            
     */
    public function setCreateDate(string $createDate)
    {
        $this->createDate = $createDate;
        return $this;
    }
 
 
 
    
    

}
