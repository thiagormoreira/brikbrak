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
     * @ORM\Column(name="idsubtype_car", type="integer", nullable=false)
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
     * @var \Application\Entity\TypeCar
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\TypeCar")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_car_idtype_car", referencedColumnName="idtype_car")
     * })
     */
    private $typeCar;

    /**
     *
     * @return the integer
     */
    public function getIdbodywork()
    {
        return $this->idbodywork;
    }

    /**
     *
     * @param integer $idbodywork            
     */
    public function setIdbodywork(integer $idbodywork)
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
    public function setBodyworkName(string $bodyworkName)
    {
        $this->bodyworkName = $bodyworkName;
        return $this;
    }

    /**
     *
     * @return the TypeCar
     */
    public function getTypeCar()
    {
        return $this->typeCar;
    }

    /**
     *
     * @param
     *            $typeCar
     */
    public function setTypeCar($typeCar)
    {
        $this->typeCar = $typeCar;
        return $this;
    }
 

    

}
