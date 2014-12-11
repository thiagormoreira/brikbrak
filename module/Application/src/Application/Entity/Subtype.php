<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubtypeItem
 *
 * @ORM\Table(name="subtype")
 * @ORM\Entity
 */
class Subtype
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idsubtype", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsubtype;

    /**
     * @var string
     *
     * @ORM\Column(name="subtype_name", type="string", length=45, nullable=true)
     */
    private $subtypeName;

    /**
     *
     * @return the integer
     */
    public function getIdsubtype()
    {
        return $this->idsubtype;
    }
    public function getId()
    {
        return $this->idsubtype;
    }

    /**
     *
     * @param
     *            $idsubtype
     */
    public function setIdsubtype($idsubtype)
    {
        $this->idsubtype = $idsubtype;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getSubtypeName()
    {
        return $this->subtypeName;
    }

    /**
     *
     * @param
     *            $subtypeName
     */
    public function setSubtypeName($subtypeName)
    {
        $this->subtypeName = $subtypeName;
        return $this;
    }
 

    
}
