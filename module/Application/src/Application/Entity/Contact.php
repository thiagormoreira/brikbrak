<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity
 */
class Contact
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcontact", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcontact;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=45, nullable=true)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=15, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=true)
     */
    private $status;

    /**
     * @var \Application\Entity\TypeContact
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\TypeContact")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_contact_idtype_contact", referencedColumnName="idtype_contact")
     * })
     */
    private $typeContact;

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
    public function getIdcontact()
    {
        return $this->idcontact;
    }
    public function getId()
    {
        return $this->idcontact;
    }

    /**
     *
     * @param
     *            $idcontact
     */
    public function setIdcontact($idcontact)
    {
        $this->idcontact = $idcontact;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     *
     * @param
     *            $value
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @param
     *            $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     *
     * @return the string
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
     * @return the TypeContact
     */
    public function getTypeContact()
    {
        return $this->typeContact;
    }

    /**
     *
     * @param
     *            $typeContact
     */
    public function setTypeContact($typeContact)
    {
        $this->typeContact = $typeContact;
        return $this;
    }
 
    
    
}
