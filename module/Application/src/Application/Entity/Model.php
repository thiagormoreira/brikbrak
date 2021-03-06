<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Model
 *
 * @ORM\Table(name="model")
 * @ORM\Entity
 */
class Model
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idmodel", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmodel;

    /**
     * @var string
     *
     * @ORM\Column(name="model_name", type="string", length=45, nullable=true)
     */
    private $modelName;

    /**
     * @var \Application\Entity\Brand
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Brand")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="brand_idbrand", referencedColumnName="idbrand")
     * })
     */
    private $brand;

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
    public function getIdmodel()
    {
        return $this->idmodel;
    }
    public function getId()
    {
        return $this->idmodel;
    }

    /**
     *
     * @param
     *            $idmodel
     */
    public function setIdmodel($idmodel)
    {
        $this->idmodel = $idmodel;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getModelName()
    {
        return $this->modelName;
    }

    /**
     *
     * @param
     *            $modelName
     */
    public function setModelName($modelName)
    {
        $this->modelName = $modelName;
        return $this;
    }

    /**
     *
     * @return the Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     *
     * @param
     *            $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
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
