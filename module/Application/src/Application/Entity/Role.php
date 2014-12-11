<?php

namespace Application\Entity;

use BjyAuthorize\Acl\HierarchicalRoleInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity
 */
class Role
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idrole", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="role_Id", type="string", length=255, nullable=false)
     */
    private $roleId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_default", type="boolean", nullable=false)
     */
    private $isDefault;

    /**
     * @var \Application\Entity\Role
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="idrole")
     * })
     */
    private $parent;

    /**
     * Constructor
     */
    public function __construct()
    {
    }

    /**
     *
     * @return the integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param
     *            $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     *
     * @param
     *            $roleId
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
        return $this;
    }

    /**
     *
     * @return the boolean
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     *
     * @param
     *            $isDefault
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;
        return $this;
    }

    /**
     *
     * @return the Role
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     *
     * @param
     *            $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }
 
    
    
}
