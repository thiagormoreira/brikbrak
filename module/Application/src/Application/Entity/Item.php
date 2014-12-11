<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;


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
     * @return the Option
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     *
     * @param
     *            $option
     */
    public function setOption($option)
    {
        $this->option = $option;
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
 
 

    
}
