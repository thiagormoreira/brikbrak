<?php

namespace Application\Controller\Helper;

class Paginator extends \Zend\Paginator\Paginator
{
    /**
     * @var string
     */
    public $action;

    /**
     *
     * @return the string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     *
     * @param string $action            
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }
 
}