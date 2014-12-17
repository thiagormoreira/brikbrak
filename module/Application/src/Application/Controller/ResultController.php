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
use Application\Entity\Advertising;
use Application\Entity\Message;

class ResultController extends AbstractActionController
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
        $entityManager = $this->getEntityManager();
        $adapter = new SelectableAdapter($entityManager->getRepository('Application\Entity\Advertising'));
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
