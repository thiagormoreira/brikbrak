<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeItem
 *
 * @ORM\Table(name="type_item")
 * @ORM\Entity
 */
class TypeItem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idtype_item", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtypeItem;

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
    public function getIdtypeItem()
    {
        return $this->idtypeItem;
    }
    public function getId()
    {
        return $this->idtypeItem;
    }

    /**
     *
     * @param
     *            $idtypeItem
     */
    public function setIdtypeItem($idtypeItem)
    {
        $this->idtypeItem = $idtypeItem;
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
