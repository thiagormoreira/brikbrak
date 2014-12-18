<?php

namespace Application\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Application\Entity\Option;

/**
 * Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity
 */
class Item
{
    /**
     * @var integer
     *
     * @ORM\Column(name="iditem", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iditem;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="year", type="integer", nullable=true)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="decimal", nullable=true)
     */
    private $value;

    /**
     * @var boolean
     *
     * @ORM\Column(name="fuel", type="boolean", nullable=true)
     */
    private $fuel;

    /**
     * @var integer
     *
     * @ORM\Column(name="km", type="integer", nullable=true)
     */
    private $km;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=45, nullable=true)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="gear", type="integer", nullable=true)
     */
    private $gear;

    /**
     * @var boolean
     *
     * @ORM\Column(name="new", type="boolean", nullable=true)
     */
    private $new;

    /**
     * @var \Application\Entity\Model
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Model")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="model_idmodel", referencedColumnName="idmodel")
     * })
     */
    private $model;

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
     * @var \Application\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_user_id", referencedColumnName="user_id")
     * })
     */
    public $user;
    
    /**
     * @var Application\Entity\Option
     *
     * @ORM\ManyToMany(targetEntity="Application\Entity\Option")
     * @ORM\JoinTable(name="item_has_options",
     *   joinColumns={
     *     @ORM\JoinColumn(name="item_iditem", referencedColumnName="iditem")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="options_idoptions", referencedColumnName="idoptions")
     *   }
     * )
     */
    private $options;
    
    public function __construct() {
        //parent::__construct();
        //$this->options = new \Doctrine\Common\Collections\ArrayCollection();
        //$this->options = new Application\Entity\Options();
        $this->options = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     *
     * @return the integer
     */
    public function getIditem()
    {
        return $this->iditem;
    }
    public function getId()
    {
        return $this->iditem;
    }

    /**
     *
     * @param
     *            $iditem
     */
    public function setIditem($iditem)
    {
        $this->iditem = $iditem;
        return $this;
    }

    /**
     *
     * @return the DateTime
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     *
     * @param
     *            $year
     */
    public function setYear($year)
    {
        $this->year = $year;
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
     * @return the boolean
     */
    public function getFuel()
    {
        return $this->fuel;
    }

    /**
     *
     * @param
     *            $fuel
     */
    public function setFuel($fuel)
    {
        $this->fuel = $fuel;
        return $this;
    }

    /**
     *
     * @return the integer
     */
    public function getKm()
    {
        return $this->km;
    }

    /**
     *
     * @param
     *            $km
     */
    public function setKm($km)
    {
        $this->km = $km;
        return $this;
    }

    
    
    /**
     *
     * @return the string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     *
     * @param
     *            $color
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     *
     * @return the boolean
     */
    public function getNew()
    {
        return $this->new;
    }

    /**
     *
     * @param
     *            $new
     */
    public function setNew($new)
    {
        $this->new = $new;
        return $this;
    }

    /**
     *
     * @return the Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     *
     * @param
     *            $model
     */
    public function setModel($model)
    {
        $this->model = $model;
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

    /**
     *
     * @return the Options
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     *
     * @param
     *            $options
     */
    public function setOptions($options)
    {
        $this->options[] = $options;
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
    public function getGear()
    {
        return $this->gear;
    }

    /**
     *
     * @param string $gear            
     */
    public function setGear($gear)
    {
        $this->gear = $gear;
        return $this;
    }
    
    public function addOptions($options)
    {
        
        /* foreach($options as $option) {
            if( ! $this->options->contains($option)) {
                $this->options->add($option);
                $option->addOption(new ArrayCollection(array($this)));
            }
        } */
    }
    
    public function removeOptions($option)
    {
        $this->options->removeElement($option);
        return $this;
    }

    public function setOption($option = null)
    {
        $this->options = $option;
    }
    
    
    public function getOption()
    {
        return $this->options;
    }
}
