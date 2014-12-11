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
//use Zend\Paginator\Paginator;

class AdminController extends AbstractActionController
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
    
    public function _list($entity)
    {
        $entityManager = $this->getEntityManager();
        $userMapper = $entityManager->getRepository('Application\Entity' . $entity);
        //$adapter = new SelectableAdapter($entityManager->getRepository('Application\Entity\Advertising'));
        $users = $userMapper->findAll();
        
        if (is_array($users)) {
            $collection = new \Doctrine\Common\Collections\ArrayCollection($users);
            $paginator = new \Zend\Paginator\Paginator(new \DoctrineModule\Paginator\Adapter\Collection($collection));
            //$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($users));
    
            $paginator->setItemCountPerPage(20);
            $paginator->setCurrentPageNumber($this->getEvent()->getRouteMatch()->getParam('p'));
        } else {
            $paginator = $users;
        }
        $this->layout('layout/admin.phtml');
        return array(
            'users' => $paginator,
            'userlistElements' => $this->getOptions()->getListElements($entity)
        );
    }
    
    public function listAction()
    {
        $entityManager = $this->getEntityManager();
        $userMapper = $entityManager->getRepository('Application\Entity\User');
        //$adapter = new SelectableAdapter($entityManager->getRepository('Application\Entity\Advertising'));
        $users = $userMapper->findAll();
        
        if (is_array($users)) {
            $collection = new \Doctrine\Common\Collections\ArrayCollection($users);
            $paginator = new \Zend\Paginator\Paginator(new \DoctrineModule\Paginator\Adapter\Collection($collection));
            //$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($users));
    
            $paginator->setItemCountPerPage(20);
            $paginator->setCurrentPageNumber($this->getEvent()->getRouteMatch()->getParam('p'));
        } else {
            $paginator = $users;
        }
        $this->layout('layout/admin.phtml');
        return array(
            'users' => $paginator,
            'userlistElements' => $this->getOptions()->getUserListElements()
        );
    }
    
    public function advertisingAction()
    {
        /*
         * @todo Doctrine Pagination
         */
        // Experimental
        $entityManager = $this->getEntityManager();
        $adapter = new SelectableAdapter($entityManager->getRepository('Application\Entity\Advertising')); //($objectRepository); // An object repository implements Selectable
        // 2) ToDo make it work. Use the paginator that comes with DoctrineORMModule
        // $adapter = new DoctrinePaginator($entityManager->getRepository('CsnUser\Entity\User'));
        // Create the paginator itself
        $paginator = new Paginator($adapter);
        $page = 1;
        if ($this->params()->fromRoute('page')) $page = $this->params()->fromRoute('page');
        $paginator->setCurrentPageNumber((int)$page)
        ->setItemCountPerPage(20)
        ->setAction('advertising');
        //var_dump($paginator->action);
        //return new ViewModel(array('paginator' => $paginator));
        $this->layout('layout/admin.phtml');
        return array(
            'advertisings' => $paginator,
            'advertisinglistElements' => $this->getOptions()->getAdvertisingListElements(),
            'action' => 'advertising'
        );
        // Fim Experimental
    }
    
    public function itemAction()
    {
        /*
         * @todo Doctrine Pagination
         */
        // Experimental
        $entityManager = $this->getEntityManager();
        $userMapper = $entityManager->getRepository('Application\Entity\Item');
        //$adapter = new SelectableAdapter($entityManager->getRepository('Application\Entity\Advertising'));
        $users = $userMapper->findAll();
        
        if (is_array($users)) {
            $collection = new \Doctrine\Common\Collections\ArrayCollection($users);
            $paginator = new \Zend\Paginator\Paginator(new \DoctrineModule\Paginator\Adapter\Collection($collection));
            //$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($users));
    
            $paginator->setItemCountPerPage(20);
            $paginator->setCurrentPageNumber($this->getEvent()->getRouteMatch()->getParam('p'));
        } else {
            $paginator = $users;
        }
        $this->layout('layout/admin.phtml');
        return array(
            'users' => $paginator,
            'userlistElements' => $this->getOptions()->getItemListElements()
        );
        // Fim Experimental
    }
    
    public function editAction()
    {
        $id = (int) $this->params('id');
        $user = $this->getEntityManager()->find('\Application\Entity\User', $id);
        
        if ($this->request->isPost()) {
            $user->setFullName($this->getRequest()
                ->getPost('fullname'));
            
            $this->getObjectManager()->persist($user);
            $this->getObjectManager()->flush();
            
            return $this->redirect()->toRoute('home');
        }
        return new ViewModel(array(
            'user' => $user
        ));
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
