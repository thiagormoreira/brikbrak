<?php
namespace Application\Controller\AbstractController;

use Zend\Mvc\Controller\AbstractActionController;
use Application\Form\AdvertisingForm;
use Application\Entity\Advertising;
use Application\Form\ItemForm;
use Application\Form\CartForm;
use Application\Form\BrandForm;
use Application\Form\ModelForm;
use Application\Form\BodyworkForm;
use Application\Form\TypeItemForm;
use Application\Form\UserForm;

abstract class AbstractAdminCrud extends AbstractActionController
{

    /**
     *
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
        // $adapter = new SelectableAdapter($entityManager->getRepository('Application\Entity\Advertising'));
        $users = $userMapper->findAll();
        
        if (is_array($users)) {
            $collection = new \Doctrine\Common\Collections\ArrayCollection($users);
            $paginator = new \Zend\Paginator\Paginator(new \DoctrineModule\Paginator\Adapter\Collection($collection));
            // $paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($users));
            
            $paginator->setItemCountPerPage(20);
            $paginator->setCurrentPageNumber($this->getEvent()
                ->getRouteMatch()
                ->getParam('p'));
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
        $entity = $this->getEvent()
            ->getRouteMatch()
            ->getParam('entity');
        $idItemType = $this->getEvent()
            ->getRouteMatch()
            ->getParam('idtype');
        $entityMapper = $entityManager->getRepository('Application\Entity\\' . ucwords($entity));
        // $adapter = new SelectableAdapter($entityManager->getRepository('Application\Entity\Advertising'));
        
        
        if($this->getEvent()->getRouteMatch()->getParam('idtype') != null){
            $list = $entityMapper->findBy(array('typeItem' => $this->getEvent()->getRouteMatch()->getParam('idtype')));
        } else {
        
            $list = $entityMapper->findAll();
            
        }
        
        if (is_array($list)) {
            $collection = new \Doctrine\Common\Collections\ArrayCollection($list);
            $paginator = new \Zend\Paginator\Paginator(new \DoctrineModule\Paginator\Adapter\Collection($collection));
            // $paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($users));
            
            $paginator->setItemCountPerPage(20);
            $paginator->setCurrentPageNumber($this->getEvent()
                ->getRouteMatch()
                ->getParam('page'));
        } else {
            $paginator = $list;
        }
        $this->layout('layout/admin.phtml');
        return array(
            'list' => $paginator,
            'entity' => $entity,
            'idItemType' => $idItemType,
            'listElements' => $this->getOptions()->getListElements($entity)
        );
    }

    public function editAction()
    {
        $objectManager = $this->getEntityManager();
        $entity = $this->getEvent()
            ->getRouteMatch()
            ->getParam('entity');
        $entityManager = $this->getEntityManager('\Application\Entity\\' . ucwords($entity));
        $id = $this->getEvent()
            ->getRouteMatch()
            ->getParam('id');
        $item = $this->getEntityManager()->find('\Application\Entity\\' . ucwords($entity), $id);
        //$formName = ucwords($entity) . 'Form';
        //$form = new $formName();
        
        
        if ($entity == "advertising") {
            $form = new AdvertisingForm($objectManager);
        } elseif ($entity == "item") {
            $form = new ItemForm($objectManager);
            //$item->setOptions($this->params()->fromPost('options'));
            
        } elseif ($entity == "brand") {
            $form = new BrandForm($objectManager);
        } elseif ($entity == "model") {
            $form = new ModelForm($objectManager);
        } elseif ($entity == "bodywork") {
            $form = new BodyworkForm($objectManager);
        } elseif ($entity == "typeItem") {
            $form = new TypeItemForm($objectManager);
        } elseif ($entity == "user") {
            $form = new UserForm($objectManager);
        }
        
        $form->bind($item);
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                // $item->persist($post);
                $objectManager->flush();
                $item = $this->getEntityManager()->find('\Application\Entity\\' . ucwords($entity), $id);
                $form->bind($item);
                
                $this->flashMessenger()->addSuccessMessage('Alterações salvas com sucesso.');
                $this->redirect()->toRoute('zfcadmin-list', array('entity' => $entity));
            }
        }
        
        return array(
            'editForm' => $form,
            'id' => $id
        )
        // 'listElements' => $this->getOptions()->getListElements($entity)
        ;
    }

    public function createAction()
    {
        $objectManager = $this->getEntityManager();
        $entity = $this->getEvent()
            ->getRouteMatch()
            ->getParam('entity');
        $idItemType = $this->getEvent()
            ->getRouteMatch()
            ->getParam('idtype');
        $entityManager = $this->getEntityManager('\Application\Entity\\' . ucwords($entity));
        $entityClass = '\Application\Entity\\' . ucwords($entity);
        $formClass = '\Application\Form\\' . ucwords($entity) . 'Form';
        $item = new $entityClass();
        $form = new $formClass($objectManager);
        
        if($idItemType != null){
            $item->setTypeItem($this->getEntityManager()->find('\Application\Entity\TypeItem', $idItemType));
        }
        
        $form->bind($item);
        
        // $formName = ucwords($entity);
        /*
        if ($entity == "advertising") {
            $form = new AdvertisingForm($objectManager);
            //$item = new Advertising();
        } elseif ($entity == "item") {
            $form = new ItemForm($objectManager);
            //$item = new Item();
        } elseif ($entity == "brand") {
            $form = new BrandForm($objectManager);
            //$item = new Brand();
        } elseif ($entity == "model") {
            $form = new ModelForm($objectManager);
            //$item = new Model();
        } elseif ($entity == "bodywork") {
            $form = new BodyworkForm($objectManager);
            //$item = new Bodywork();
        } elseif ($entity == "typeItem") {
            $form = new TypeItemForm($objectManager);
            //$item = new TypeItem();
        }
        
        $form->bind($item);
        */
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                // $item->persist($post);
                $entityManager->persist($item);
                $entityManager->flush();
                // $form->bind($item);
                
                $this->flashMessenger()->addSuccessMessage('Adicionado com sucesso.');
                $this->redirect()->toRoute('zfcadmin-list', array('entity' => $entity));
            }
        }
        
        return array(
            'createForm' => $form,
            
        )
        // 'id' => $id,
        // 'listElements' => $this->getOptions()->getListElements($entity)
        ;
    }
    
    public function deleteAction()
    {
        $objectManager = $this->getEntityManager();
        $entity = $this->getEvent()
        ->getRouteMatch()
        ->getParam('entity');
        $entityManager = $this->getEntityManager('\Application\Entity\\' . ucwords($entity));
        $id = $this->getEvent()
        ->getRouteMatch()
        ->getParam('id');
        $item = $this->getEntityManager()->find('\Application\Entity\\' . ucwords($entity), $id);
        // $formName = ucwords($entity);
        
        if (null === $id) {
            return $this->redirect()->toRoute('zfcadmin');
        } else {
            $objectManager->remove($item);
            $objectManager->flush();
            
            $this->flashMessenger()->addSuccessMessage('Item apagado com sucesso.');
            $this->redirect()->toRoute('zfcadmin-list', array('entity' => $entity));
        }
    }
}