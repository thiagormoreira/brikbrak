<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeContact
 *
 * @ORM\Table(name="type_contact")
 * @ORM\Entity
 */
class TypeContact
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idtype_contact", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtypeContact;

    /**
     * @var string
     *
     * @ORM\Column(name="type_contact_name", type="string", length=15, nullable=true)
     */
    private $typeContactName;

    /**
     *
     * @return the integer
     */
    public function getIdtypeContact()
    {
        return $this->idtypeContact;
    }

    /**
     *
     * @param
     *            $idtypeContact
     */
    public function setIdtypeContact($idtypeContact)
    {
        $this->idtypeContact = $idtypeContact;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getTypeContactName()
    {
        return $this->typeContactName;
    }

    /**
     *
     * @param
     *            $typeContactName
     */
    public function setTypeContactName($typeContactName)
    {
        $this->typeContactName = $typeContactName;
        return $this;
    }
 

    
}
