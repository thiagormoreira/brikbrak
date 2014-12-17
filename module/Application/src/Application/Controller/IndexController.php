<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity;

class IndexController extends AbstractActionController
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
    
    public function modelAction()
    {
        $dql = 'SELECT COUNT(p) FROM Application\Entity\Item p WHERE p.typeItem = 1 OR p.typeItem = 3 OR p.typeItem = 4';
        $q = $this->getEntityManager()->createQuery($dql);
        
        $carCnt = $q->getSingleScalarResult();
        
        $dql = 'SELECT COUNT(p) FROM Application\Entity\Item p WHERE p.typeItem = 5';
        $q = $this->getEntityManager()->createQuery($dql);
        
        $cartCnt = $q->getSingleScalarResult();
        
        $dql = 'SELECT COUNT(p) FROM Application\Entity\Item p WHERE p.typeItem = 6 OR p.typeItem = 7';
        $q = $this->getEntityManager()->createQuery($dql);
        
        $acCnt = $q->getSingleScalarResult();
        
        return new ViewModel(array(
            'carCnt' => $carCnt,
            'cartCnt' => $cartCnt,
            'acCnt' => $acCnt
        ));
    }
}
