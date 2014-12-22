<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeAdvertising
 *
 * @ORM\Table(name="type_advertising")
 * @ORM\Entity
 */
class TypeAdvertising
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idtype_advertising", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $typeAdvertising;

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
    public function getTypeAdvertising()
    {
        return $this->typeAdvertising;
    }

    /**
     *
     * @param
     *            $typeAdvertising
     */
    public function settypeAdvertising($typeAdvertising)
    {
        $this->typeAdvertising = $typeAdvertising;
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
