<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Option
 *
 * @ORM\Table(name="options")
 * @ORM\Entity
 */
class Options
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idoptions", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idoptions;

    /**
     * @var boolean
     *
     * @ORM\Column(name="options_name", type="string", nullable=true)
     */
    private $optionsName;

    /**
     * @var \Application\Entity\TypeItem
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\TypeItem")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_item_idtype_item", referencedColumnName="idtype_item")
     * })
     */
    private $typeItem;

    /**
     *
     * @return the integer
     */
    public function getIdoptions()
    {
        return $this->idoptions;
    }
    public function getId()
    {
        return $this->idoptions;
    }

    /**
     *
     * @param
     *            $idoptions
     */
    public function setIdoptions($idoptions)
    {
        $this->idoptions = $idoptions;
        return $this;
    }

    /**
     *
     * @return the boolean
     */
    public function getOptionsName()
    {
        return $this->optionsName;
    }

    /**
     *
     * @param boolean $optionsName            
     */
    public function setOptionsName($optionsName)
    {
        $this->optionsName = $optionsName;
        return $this;
    }

    /**
     *
     * @return the TypeItem
     */
    public function getTypeItem()
    {
        return $this->typeItem;
    }

    /**
     *
     * @param
     *            $typeItem
     */
    public function setTypeItem($typeItem)
    {
        $this->typeItem = $typeItem;
        return $this;
    }
    
}
