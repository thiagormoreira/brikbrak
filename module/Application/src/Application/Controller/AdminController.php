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
        $entity = $this->getEvent()->getRouteMatch()->getParam('entity');
        $entityMapper = $entityManager->getRepository('Application\Entity\\' . ucwords($entity));
        //$adapter = new SelectableAdapter($entityManager->getRepository('Application\Entity\Advertising'));
        $list = $entityMapper->findAll();
        
        if (is_array($list)) {
            $collection = new \Doctrine\Common\Collections\ArrayCollection($list);
            $paginator = new \Zend\Paginator\Paginator(new \DoctrineModule\Paginator\Adapter\Collection($collection));
            //$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($users));
    
            $paginator->setItemCountPerPage(20);
            $paginator->setCurrentPageNumber($this->getEvent()->getRouteMatch()->getParam('p'));
        } else {
            $paginator = $list;
        }
        $this->layout('layout/admin.phtml');
        return array(
            'list' => $paginator,
            'listElements' => $this->getOptions()->getListElements($entity)
        );
    }
    
    public function editAction()
    {
        $entityManager = $this->getEntityManager();
        $entity = $this->getEvent()->getRouteMatch()->getParam('entity');
        $id = $this->getEvent()->getRouteMatch()->getParam('id');
        $item = $this->getEntityManager()->find('\Application\Entity\\' . ucwords($entity), $id);
        
        //$form = new Edit($entity, $this->getOptions()->getListElements($entity));
        
        /** @var $request \Zend\Http\Request */
        $request = $this->getRequest();
        if ($request->isPost()) {
        /*
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $user = $this->getAdminUserService()->edit($form, (array)$request->getPost(), $user);
                if ($user) {
                    $this->flashMessenger()->addSuccessMessage('The user was edited');
                    return $this->redirect()->toRoute('zfcadmin/zfcuseradmin/list');
                }
            }
            */
        } else {
            //$form->populateForm($item);
        }
        
        return array(
            'editForm' => $form,
            'id' => $id,
            //'listElements' => $this->getOptions()->getListElements($entity)
        );
    }
    
    public function createAction()
    {
        $entityManager = $this->getEntityManager();
        $entity = $this->getEvent()->getRouteMatch()->getParam('entity');
        $form = new Create($entity, $this->getOptions()->getListElements($entity));
        
        return array(
            'createForm' => $form,
            );
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
