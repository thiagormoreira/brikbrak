<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @author Thiago Moreira <loganguns@gmail.com>
 */
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;
use Application\Controller\Helper\Paginator;
use DoctrineModule\Paginator\Adapter\Selectable as SelectableAdapter;
use Doctrine\Common\Collecttions\Criteria as DoctrineCriteria; // for criteria
use ZfcUser\Controller\Plugin\ZfcUserAuthentication;
use Application\Form\UserAdvertisingForm;
use Application\Entity\Advertising;
use Application\Entity\Item;
use Application\Entity\Model;
use Application\Entity\Address;
use Application\Entity\City;
use Application\Entity\Contact;

class UserController extends AbstractActionController
{

    /**
     * @var unknown
     */
    protected $em;
    
    public function __construct(){
    }

    /**
     * @return Ambigous <object, multitype:>
     */
    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }
    
    public function indexAction(){
        if($this->zfcUserAuthentication()->hasIdentity() === false){
            header('Location: /user/login');
            exit;
        }

        $entityManager = $this->getEntityManager();
        $userAdvertisings = $entityManager->getRepository('Application\Entity\Advertising')->findBy(array('user' => $this->zfcUserAuthentication()->getIdentity()->getId()));
        $userMessages = $entityManager->getRepository('Application\Entity\Message')->findBy(array('user' => $this->zfcUserAuthentication()->getIdentity()->getId()));
        
        return array(
            'userAdvertisings' => $userAdvertisings,
            'userMessages' => $userMessages,
        );
    }
    
    public function novoAnuncioAction(){
        
        $entityManager = $this->getEntityManager();
        
        $form = new UserAdvertisingForm($entityManager);
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            
            $item = new Item();
            $item->setYear($this->params()->fromPost('year'));
            $item->setValue($this->params()->fromPost('value'));
            $item->setFuel($this->params()->fromPost('fuel'));
            $item->setKm($this->params()->fromPost('km'));
            $item->setColor($this->params()->fromPost('color'));
            $item->setNew($this->params()->fromPost('new'));
            $item->setModel($this->getEntityManager()->find('\Application\Entity\Model', $this->params()->fromPost('model')));
            $item->setTypeItem($this->getEntityManager()->find('\Application\Entity\TypeItem',$this->params()->fromPost('typeItem')));
            $item->setUser($this->getEntityManager()->find('\Application\Entity\User', $this->zfcUserAuthentication()->getIdentity()->getId()));
            $entityManager->persist($item);
            $entityManager->flush();
            
            $address = new Address();
            $address->setAddress($this->params()->fromPost('address'));
            $address->setNumber($this->params()->fromPost('number'));
            $address->setComplement($this->params()->fromPost('complement'));
            $address->setDistrictName($this->params()->fromPost('district_name'));
            $address->setCity($this->getEntityManager()->find('\Application\Entity\City',$this->params()->fromPost('city')));
            $address->setTypeAddress($this->getEntityManager()->find('\Application\Entity\TypeAddress', '1'));
            $entityManager->persist($address);
            $entityManager->flush();

            $contact = new Contact();
            $contact->setValue($this->params()->fromPost('contact-number'));
            $contact->setStatus('1');
            $contact->setTypeContact($this->getEntityManager()->find('\Application\Entity\TypeContact', '1'));
            $entityManager->persist($contact);
            $entityManager->flush();
            
            $advertising = new Advertising();
            $advertising->setAddress($this->getEntityManager()->find('\Application\Entity\Address', $address->getId()));
            $advertising->setText($this->params()->fromPost('text'));
            $advertising->setUser($this->getEntityManager()->find('\Application\Entity\User', $this->zfcUserAuthentication()->getIdentity()->getId()));
            $advertising->setContact($this->getEntityManager()->find('\Application\Entity\Contact', $contact->getId()));
            $advertising->setItem($this->getEntityManager()->find('\Application\Entity\Item', $item->getId()));
            $entityManager->persist($advertising);
            $entityManager->flush();
            
            $this->flashMessenger()->addSuccessMessage('Anuncio cadastrado com sucesso');
            $this->redirect()->toRoute('zfcuser');
        }
        
        return array(
            'form' => $form,
        );
    }
    
    public function deleteAdAction(){
        $objectManager = $this->getEntityManager();
        $id = $this->getEvent()
        ->getRouteMatch()
        ->getParam('idanuncio');
        $item = $this->getEntityManager()->find('\Application\Entity\Advertising', $id);
        
        if (null === $id) {
            return $this->redirect()->toRoute('zfcuser');
        } else {
            if($item->getUser()->getId() == $this->zfcUserAuthentication()->getIdentity()->getId()){
                $objectManager->remove($item);
                $objectManager->flush();
            
                $this->flashMessenger()->addSuccessMessage('Anuncio deletado com sucesso.');
                $this->redirect()->toRoute('zfcuser');
            } else {
                $this->flashMessenger()->addErrorMessage('Esse anuncio nao pertence a sua conta.');
                $this->redirect()->toRoute('zfcuser');
            }
        }
    }
    
}
