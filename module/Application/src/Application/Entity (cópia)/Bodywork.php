<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bodywork
 *
 * @ORM\Table(name="bodywork")
 * @ORM\Entity
 */
class Bodywork
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idbodywork", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idbodywork;

    /**
     * @var string
     *
     * @ORM\Column(name="bodywork_name", type="string", length=45, nullable=true)
     */
    private $bodyworkName;

    /**
     * @var \Application\Entity\TypeItem
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\SubtypeItem")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="subtype_idsubtype", referencedColumnName="idsubtype")
     * })
     */
    private $subtypeItem;

    /**
     *
     * @return the integer
     */
    public function getIdbodywork()
    {
        return $this->idbodywork;
    }
    public function getId()
    {
        return $this->idbodywork;
    }

    /**
     *
     * @param integer $idbodywork            
     */
    public function setIdbodywork($idbodywork)
    {
        $this->idbodywork = $idbodywork;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getBodyworkName()
    {
        return $this->bodyworkName;
    }

    /**
     *
     * @param string $bodyworkName            
     */
    public function setBodyworkName($bodyworkName)
    {
        $this->bodyworkName = $bodyworkName;
        return $this;
    }

    /**
     *
     * @return the SubtypeItem
     */
    public function getSubtypeItem()
    {
        return $this->subtypeItem;
    }

    /**
     *
     * @param
     *            $subtypeItem
     */
    public function setSubtypeItem($subtypeItem)
    {
        $this->subtypeItem = $subtypeItem;
        return $this;
    }
 

    

}
