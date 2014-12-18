<?php

namespace Application\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Option
 *
 * @ORM\Table(name="options")
 * @ORM\Entity
 */
class Option
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
     * @ORM\ManyToMany(targetEntity="Application\Entity\Item", mappedBy="options")
     */
    public $items;

    /**
     * @ORM\ManyToMany(targetEntity="Application\Entity\Item", inversedBy="option")
     * @ORM\JoinTable(name="item_has_options",
     *                      joinColumns={@ORM\JoinColumn(name="ioptions_idoptions", referencedColumnName="idoptions")},
     *               inverseJoinColumns={@ORM\JoinColumn(name="item_iditem", referencedColumnName="iditem")}
     *          )
     */
    
    protected $hcp;

    public function __construct() {
        $this->items = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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

    /**use Doctrine\Common\Collections\ArrayCollection;
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
    
    public function addOption(Option $option)
    {
        if ($this->option->contains($option)) {
            return;
        }

        $this->option->add($option);
        $option->addoption($this);
    }
}
