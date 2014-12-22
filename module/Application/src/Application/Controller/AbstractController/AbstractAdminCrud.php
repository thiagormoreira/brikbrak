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
use Application\Form\SubtypeForm;
use Application\Form\UserForm;
use Zend\Validator\File\Size;
use Zend\Validator\File\MimeType;
use Zend\Stdlib\ErrorHandler;

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
        
        
        if($this->getEvent()->getRouteMatch()->getParam('idtype') != null){
            $list = $entityMapper->findBy(array('typeItem' => $this->getEvent()->getRouteMatch()->getParam('idtype')));
        } else {
        
            $list = $entityMapper->findAll();
            
        }
        
        if (is_array($list)) {
            $collection = new \Doctrine\Common\Collections\ArrayCollection($list);
            $paginator = new \Zend\Paginator\Paginator(new \DoctrineModule\Paginator\Adapter\Collection($collection));
            
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
        
        
        if ($entity == "advertising") {
            $form = new AdvertisingForm($objectManager);
        } elseif ($entity == "item") {
            $form = new ItemForm($objectManager);
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
        } elseif ($entity == "subtype") {
            $form = new SubtypeForm($objectManager);
        }
        
        $form->bind($item);
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $objectManager->persist($item);
                $objectManager->flush();
                $item = $this->getEntityManager()->find('\Application\Entity\\' . ucwords($entity), $id);
                
                if ($this->params()->fromFiles('image-file')['0']['size'] > 0) {
                    $nonFile = $request->getPost()->toArray();
                    $Files    = $this->params()->fromFiles('image-file');

                    $size = new Size(array('max'=>2000000));
                    $mimeType = new MimeType('image/png,image/jpg,image/jpeg,image/x-png');
                     
                    $adapter = new \Zend\File\Transfer\Adapter\Http();
                    foreach ($Files as $File){
                        $adapter->setValidators(array($size, $mimeType), $File['name']);
                        if (!$adapter->isValid()){
                            $dataError = $adapter->getMessages();
                            $error = array();
                            foreach($dataError as $key=>$row)
                            {
                                $error[] = $row;
                            }
                            $form->setMessages(array('image-file'=>$error ));
                        } else {
                            ErrorHandler::start();
                            move_uploaded_file($File['tmp_name'], dirname(__DIR__).'/../../../../../htdocs/assets/images/product/' . $id . '/' . $File['name']);
                            ErrorHandler::stop(true);
                        }
                    }
                }
                

                $form->bind($item);
                
                $this->flashMessenger()->addSuccessMessage('Alterações salvas com sucesso.');
                $this->redirect()->toRoute('zfcadmin-list', array('entity' => $entity));
            }
        }
        
        return array(
            'editForm' => $form,
            'id' => $id,
            'entity' => $entity,
        )
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
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $entityManager->persist($item);
                $entityManager->flush();
                
                $this->flashMessenger()->addSuccessMessage('Adicionado com sucesso.');
                $this->redirect()->toRoute('zfcadmin-list', array('entity' => $entity));
            }
        }
        
        return array(
            'createForm' => $form,
            
        );
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