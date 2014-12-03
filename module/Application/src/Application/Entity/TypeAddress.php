<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeAddress
 *
 * @ORM\Table(name="type_address")
 * @ORM\Entity
 */
class TypeAddress
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idtype_address", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $typeAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="type_name", type="string", length=15, nullable=true)
     */
    private $typeName;

    /**
     *
     * @return the integer
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
    public function settypeAddress($typeAddress)
    {
        $this->typeAddress = $typeAddress;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getTypeName()
    {
        return $this->typeName;
    }

    /**
     *
     * @param
     *            $typeName
     */
    public function setTypeName($typeName)
    {
        $this->typeName = $typeName;
        return $this;
    }
 

    
}
