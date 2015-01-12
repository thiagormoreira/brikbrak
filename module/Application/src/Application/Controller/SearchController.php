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
use Doctrine\Common\Collections\Criteria as DoctrineCriteria;
use ZfcUser\Controller\Plugin\ZfcUserAuthentication;
use Application\Entity\Advertising;
use Application\Entity\Message;
use Zend\Mail;

class SearchController extends AbstractActionController
{

    /**
     * @var unknown
     */
    protected $em;

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

    /* (non-PHPdoc)
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
    public function indexAction()
    {
        $request = $this->getRequest();
        if ($request->isPost()) {
            //var_dump($this->params()->fromPost());
            
            /* array(11) {
                ["brand"]=> "1"
                ["model"]=> "1"
                ["subType"]=> "1"
                ["bodywork"]=> "1"
                ["gear"]=> "1"
                ["year_end"]=> "2015"
                ["year"]=> "1950"
                ["state"]=> "19"
                ["city"]=> "3593"
                ["value_end"]=> "100000000"
                ["value"]=> "10000"
            } */
            
        }
        
        $entityManager = $this->getEntityManager();
        
        $criteria = DoctrineCriteria::create();
        
        //$criteria->where(DoctrineCriteria::expr()->eq('status', '1'));
        //$criteria->andWhere(DoctrineCriteria::expr()->eq('typeAdvertising', $this->getEntityManager()->find('\Application\Entity\TypeAdvertising', 1 )));

        $criteria->andWhere(DoctrineCriteria::expr()->eq('typeItem', $this->getEntityManager()->find('\Application\Entity\TypeItem', $this->params()->fromPost('typeItem'))));
        
        if($this->params()->fromPost('new') != null){
            $criteria->where(DoctrineCriteria::expr()->eq('new', $this->params()->fromPost('status')));
        }
        if($this->params()->fromPost('model') != null){
            $criteria->andWhere(DoctrineCriteria::expr()->eq('model', $this->getEntityManager()->find('\Application\Entity\Model', $this->params()->fromPost('model'))));
        }
        if($this->params()->fromPost('gear') != null){
            $criteria->andWhere(DoctrineCriteria::expr()->eq('gear', $this->params()->fromPost('gear')));
        }
        if($this->params()->fromPost('year') != null){
            $criteria->andWhere(DoctrineCriteria::expr()->gte('year', $this->params()->fromPost('year')));
        }
        if($this->params()->fromPost('year_end') != null){
            $criteria->andWhere(DoctrineCriteria::expr()->lte('year', $this->params()->fromPost('year_end')));
        }
        if($this->params()->fromPost('value') != null){
            $criteria->andWhere(DoctrineCriteria::expr()->gte('value', $this->params()->fromPost('value')));
        }
        if($this->params()->fromPost('value_end') != null){
            $criteria->andWhere(DoctrineCriteria::expr()->lte('value', $this->params()->fromPost('value_end')));
        }
            
        
        $adapter = new SelectableAdapter($entityManager->getRepository('Application\Entity\Item'), $criteria);
        $paginator = new Paginator($adapter);
        $page = 1;
        if ($this->params()->fromRoute('page')) $page = $this->params()->fromRoute('page');
        $paginator->setCurrentPageNumber((int)$page)
        ->setItemCountPerPage(10)
        ->setAction('advertising');
        return new ViewModel(array(
            'advertising_list' => $paginator,
            'action' => 'result'
        ));
    }

    /* (non-PHPdoc)
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
    public function resultPjAction()
    {
        $entityManager = $this->getEntityManager();
        $id = $this->getEvent()
        ->getRouteMatch()
        ->getParam('typeAdvertising');
        $criteria = DoctrineCriteria::create();
        $criteria->where(DoctrineCriteria::expr()->eq('status', '1'));
        $criteria->andWhere(DoctrineCriteria::expr()->eq('typeAdvertising', $this->getEntityManager()->find('\Application\Entity\TypeAdvertising', $id)));
        $adapter = new SelectableAdapter($entityManager->getRepository('Application\Entity\Advertising'), $criteria);
        $paginator = new Paginator($adapter);
        $page = 1;
        if ($this->params()->fromRoute('page')) $page = $this->params()->fromRoute('page');
        $paginator->setCurrentPageNumber((int)$page)
        ->setItemCountPerPage(10)
        ->setAction('advertising');
        return new ViewModel(array(
            'advertising_list' => $paginator,
            'action' => 'result',
            'typeAdvertising' => $id
        ));
    }

    /* (non-PHPdoc)
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
    public function detailAction()
    {
        $entityManager = $this->getEntityManager();
        
        $request = $this->getRequest();
        if ($request->isPost()) {
        
            $message = new Message();
            $message->setContactName($this->params()->fromPost('nome'));
            $message->setContactEmail($this->params()->fromPost('email'));
            $message->setContactTel($this->params()->fromPost('ddd') . $this->params()->fromPost('telefone'));
            $message->setMessage($this->params()->fromPost('proposta'));
            $message->setAdvertising($this->getEntityManager()->find('\Application\Entity\Advertising', $this->params('id')));
            $message->setUser($this->getEntityManager()->find('\Application\Entity\User', $this->zfcUserAuthentication()->getIdentity()->getId()));
            $entityManager->persist($message);
            $entityManager->flush();
            
            $this->flashMessenger()->addSuccessMessage('Mensagem enviada com sucesso.');
        }
        $objectManager = $this->getEntityManager();
        $advertising = $this->getEntityManager()
                ->getRepository('Application\Entity\Advertising')
                ->find($this->params('id'));
        
        if($advertising != null){
            $advertising->addViewCount();
            $objectManager->flush();
            
            return new ViewModel(array(
                'advertising' => $advertising
            ));
       } else {
           
           $this->flashMessenger()->addErrorMessage('Anúncio não encontrado.');
           $this->redirect()->toRoute('zfcuser');
       }
    }
}
