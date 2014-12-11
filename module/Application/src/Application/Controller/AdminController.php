<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity;
use Application\Options\ModuleOptions;
use Application\Controller\Helper\Paginator;
use DoctrineModule\Paginator\Adapter\Selectable as SelectableAdapter;
use Doctrine\Common\Collecttions\Criteria as DoctrineCriteria; // for criteria
use ZfcUser\Controller\Plugin\ZfcUserAuthentication;
use Zend\Filter\File\UpperCase;
use Application\Form\Edit;
use Application\Form\Create;
use Application\Controller\AbstractController\AbstractAdminCrud;
//use Zend\Paginator\Paginator;

class AdminController extends AbstractAdminCrud
{
    /**
     * @var unknown
     */
    protected $_eventManager, $_options, $_viewModel;
    
    public function __construct()
    {
        //new ViewModel(array(
            
            //));
    }
    /**
     * @return Ambigous <object, multitype:>
     */
    public function getEntityManager()
    {
        if (null === $this->_eventManager) {
            $this->_eventManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->_eventManager;
    }
    
    public function indexAction()
    {
        $this->layout('layout/admin.phtml');
        return new ViewModel();
    }

    public function setOptions(ModuleOptions $_options)
    {
        $this->_options = $_options;
        return $this;
    }
    
    public function getOptions()
    {
        if (!$this->_options instanceof ModuleOptions) {
            $this->setOptions($this->getServiceLocator()->get('module__options'));
        }
        return $this->_options;
    }
    
}
