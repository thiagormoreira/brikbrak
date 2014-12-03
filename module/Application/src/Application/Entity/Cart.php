<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cart
 *
 * @ORM\Table(name="cart")
 * @ORM\Entity
 */
class Cart
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cart_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cartId;

    /**
     * @var \Application\Entity\Option
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Option")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="option_idoption", referencedColumnName="idoption")
     * })
     */
    private $option;

    /**
     *
     * @return the integer
     */
    public function getCartId()
    {
        return $this->cartId;
    }

    /**
     *
     * @param
     *            $cartId
     */
    public function setCartId($cartId)
    {
        $this->cartId = $cartId;
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
 

    
}
