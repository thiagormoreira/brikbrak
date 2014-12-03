<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Brand
 *
 * @ORM\Table(name="brand")
 * @ORM\Entity
 */
class Brand
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idbrand", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idbrand;

    /**
     * @var string
     *
     * @ORM\Column(name="brand_name", type="string", length=45, nullable=true)
     */
    private $brandName;

    /**
     *
     * @return the integer
     */
    public function getIdbrand()
    {
        return $this->idbrand;
    }

    /**
     *
     * @param
     *            $idbrand
     */
    public function setIdbrand($idbrand)
    {
        $this->idbrand = $idbrand;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getBrandName()
    {
        return $this->brandName;
    }

    /**
     *
     * @param
     *            $brandName
     */
    public function setBrandName($brandName)
    {
        $this->brandName = $brandName;
        return $this;
    }
 

    
}
