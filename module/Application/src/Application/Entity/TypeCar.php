<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeCar
 *
 * @ORM\Table(name="type_car")
 * @ORM\Entity
 */
class TypeCar
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idtype_car", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtypeCar;

    /**
     * @var string
     *
     * @ORM\Column(name="type_name", type="string", length=45, nullable=true)
     */
    private $typeName;

    /**
     *
     * @return the integer
     */
    public function getIdtypeCar()
    {
        return $this->idtypeCar;
    }

    /**
     *
     * @param
     *            $idtypeCar
     */
    public function setIdtypeCar($idtypeCar)
    {
        $this->idtypeCar = $idtypeCar;
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
