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
use Zend\View\Model\JsonModel;

class AjaxController extends AbstractActionController
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
    
    public function modelsAction()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT u.idmodel, u.modelName FROM Application\Entity\Model u WHERE u.brand = :idbrand AND u.typeItem = :idtypeItem');
        $query->setParameter('idbrand', $this->getEvent()
            ->getRouteMatch()
            ->getParam('idbrand'));
        $query->setParameter('idtypeItem', $this->getEvent()
            ->getRouteMatch()
            ->getParam('idtypeItem'));
        $models = $query->getResult();
        
        $json = new JsonModel(array(
            'models' => $models
        ));
        
        return $json;
    }
    
    public function subTypesAction()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT u.idsubtype, u.subtypeName FROM Application\Entity\Subtype u WHERE u.typeItem = :idtypeItem');
        $query->setParameter('idtypeItem', $this->getEvent()
            ->getRouteMatch()
            ->getParam('idtypeItem'));
        $subtypes = $query->getResult();
        
        $json = new JsonModel(array(
            'subtypes' => $subtypes
        ));
        
        return $json;
    }
    
    public function bodyworksAction()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT u.idbodywork, u.bodyworkName FROM Application\Entity\Bodywork u WHERE u.subtypeItem = :idsubtypeItem');
        $query->setParameter('idsubtypeItem', $this->getEvent()
            ->getRouteMatch()
            ->getParam('idsubtypeItem'));
        $bodyworks = $query->getResult();
        
        $json = new JsonModel(array(
            'bodyworks' => $bodyworks
        ));
        
        return $json;
    }
    
    public function citiesAction()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT u.idcity, u.cityName FROM Application\Entity\City u WHERE u.state = :idstate');
        $query->setParameter('idstate', $this->getEvent()
            ->getRouteMatch()
            ->getParam('idstate'));
        $statesB = $query->getResult();
        
        $json = new JsonModel(array(
            'states' => $statesB
        ));
        
        return $json;
    }
}
