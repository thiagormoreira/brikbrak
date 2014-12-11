<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HistoryAccess
 *
 * @ORM\Table(name="history_access")
 * @ORM\Entity
 */
class HistoryAccess
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idhistory_access", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idhistoryAccess;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_address", type="string", length=45, nullable=true)
     */
    private $ipAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="user_agent", type="string", length=45, nullable=true)
     */
    private $userAgent;

    /**
     * @var string
     *
     * @ORM\Column(name="user_os", type="string", length=45, nullable=true)
     */
    private $userOs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Application\Entity\User", mappedBy="historyAccesshistoryAccess")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     *
     * @return the integer
     */
    public function getIdhistoryAccess()
    {
        return $this->idhistoryAccess;
    }

    /**
     *
     * @param
     *            $idhistoryAccess
     */
    public function setIdhistoryAccess($idhistoryAccess)
    {
        $this->idhistoryAccess = $idhistoryAccess;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     *
     * @param
     *            $ipAddress
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     *
     * @param
     *            $userAgent
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getUserOs()
    {
        return $this->userOs;
    }

    /**
     *
     * @param
     *            $userOs
     */
    public function setUserOs($userOs)
    {
        $this->userOs = $userOs;
        return $this;
    }

    /**
     *
     * @return the Collection
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
