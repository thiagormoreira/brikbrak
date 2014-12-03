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
//use Zend\Paginator\Paginator;

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
        $adapter = new SelectableAdapter($entityManager->getRepository('Application\Entity\Advertising')); //($objectRepository); // An object repository implements Selectable
        // 2) ToDo make it work. Use the paginator that comes with DoctrineORMModule
        // $adapter = new DoctrinePaginator($entityManager->getRepository('CsnUser\Entity\User'));
        // Create the paginator itself
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
        return new ViewModel(array(
            'advertising' => $this->getEntityManager()
                ->getRepository('Application\Entity\Advertising')
                ->find($this->params('id'))
        ));
    }
}
