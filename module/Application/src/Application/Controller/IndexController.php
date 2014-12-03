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
    public function indexAction()
    {
        //$ad = new \Application\Entity\Advertising();
        //$ad->setAddress(1);
        //$ad->setUser(2);
        //$ad->setCar(1);
        //$ad->setText("Teste");
        //var_dump($ad);
        //$this->_em->persist($ad);
        //$this->_em->flush();
        return new ViewModel();
    }
}
