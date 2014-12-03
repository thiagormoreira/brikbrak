<?php
/**
 * 
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function init($moduleManager)
    {
        $moduleManager->loadModule('ZfcUser');
        $moduleManager->loadModule('LdcUserProfile');
        //$moduleManager->loadModule('AhBootstrapZfcUser');
    }
    
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        //Cria o translator
        $translator = new \Zend\Mvc\I18n\Translator(new \Zend\I18n\Translator\Translator());
        
        //Adiciona o arquivo de tradução
        $translator->addTranslationFile(
            'phpArray',
            __DIR__ . '/../../vendor/zendframework/zendframework/resources/languages/pt_BR/Zend_Validate.php',
            'default',
            'pt_BR'
        );
        
        //Define o tradutor padrão dos validadores
        \Zend\Validator\AbstractValidator::setDefaultTranslator($translator);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    'Application' => __DIR__ . '/src/Application',
                ),
            ),
        );
    }
    
    public function getServiceConfig ()
    {
        return array(
            'factories' => array(
                'module_options' => function  ($sm)
                {
                    return new Options\ModuleOptions();
                },
                'admin' => 'Application\Navigation\Service\AdminNavigationFactory',
            ),
            
        );
    }
    
}
