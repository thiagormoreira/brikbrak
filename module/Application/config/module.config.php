<?php
namespace Application;

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */
return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action' => 'index'
                    )
                )
            ),
            // @todo Fix Route 
            'zfcadmin' => array(
                'options' => array(
                    'defaults' => array(
                        'controller' => 'Application\Controller\Admin',
                        'action' => 'index'
                    )
                )
            ),
            'zfcuser' => array(
                'options' => array(
                    'defaults' => array(
                        'controller' => 'Application\Controller\User',
                        'action' => 'index'
                    )
                )
            ),
            'zfcadmin-list' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/admin/:entity[/:idtype][/page/:page]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Admin',
                        'action' => 'list',
                        'entity' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    )
                )
            ),
            'zfcadmin-edit' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/admin/:entity/edit/:id',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Admin',
                        'action'     => 'edit'
                    )
                )
            ),
            'zfcadmin-create' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/admin/:entity/create[/:idtype]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Admin',
                        'action' => 'create',
                    )
                )
            ),
            'novo-anuncio' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/novo-anuncio',
                    'defaults' => array(
                        'controller' => 'Application\Controller\User',
                        'action' => 'novoAnuncio',
                    )
                )
            ),
            'authenticate' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/user/login',
                    'defaults' => array(
                    ),
                ),
            ),
            /*
            'zfcuser-admin-edit' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/admin/user/edit/:userId',
                    'defaults' => array(
                        '__NAMESPACE__' => 'ZfcUserAdmin\Controller',
                        'controller'    => 'UserAdminController',
                        'action' => 'edit',
                        'userId'     => 0
                    )
                )
            ),*/
            'zfcadmin-delete' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/admin/:entity/delete/:id',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Admin',
                        'action' => 'delete',
                    )
                )
            ),
            'advertising' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/anuncio[/:id]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Result',
                        'action' => 'detail',
                        'id' => 'none'
                    )
                )
            ),
            'result' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/result[/page/:page]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Result',
                        'action' => 'index',
                    )
                )
            ),
            'atendimento' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/atendimento',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Portal',
                        'action' => 'atendimento'
                    )
                )
            ),
            'duvidas-gerais' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/duvidas-gerais',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Portal',
                        'action' => 'duvidasGerais'
                    )
                )
            ),
            'monitoramento' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/monitoramento',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Portal',
                        'action' => 'monitoramento'
                    )
                )
            ),
            'politica-privacidade' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/politica-privacidade',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Portal',
                        'action' => 'politicaPrivacidade'
                    )
                )
            ),
            'profissionais' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/profissionais',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Portal',
                        'action' => 'profissionais'
                    )
                )
            ),
            'quem-somos' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/quem-somos',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Portal',
                        'action' => 'quemSomos'
                    )
                )
            ),
            'rastreadores' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/rastreadores',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Portal',
                        'action' => 'rastreadores'
                    )
                )
            ),
            'revenda' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/revenda',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Portal',
                        'action' => 'revenda'
                    )
                )
            ),
            'servicos' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/servicos',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Portal',
                        'action' => 'servicos'
                    )
                )
            ),
            'anuncios-para-pessoa-juridica' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/anuncios-para-pessoa-juridica',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Portal',
                        'action' => 'anunciosParaPessoaJuridica'
                    )
                )
            ),
            'publicidade' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/publicidade',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Portal',
                        'action' => 'publicidade'
                    )
                )
            ),
            'imprensa' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/imprensa',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Portal',
                        'action' => 'imprensa'
                    )
                )
            ),
            'planos' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/planos',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Portal',
                        'action' => 'planos'
                    )
                )
            ),
            'termos-de-uso' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/termos-de-uso',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Portal',
                        'action' => 'termosDeUso'
                    )
                )
            ),
            'models' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/ajax/models/:idbrand/typeitem/:idtypeItem',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action' => 'models'
                    )
                )
            ),
            'subTypes' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/ajax/sub-types/:idtypeItem',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action' => 'subTypes'
                    )
                )
            ),
            'bodyworks' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/ajax/bodyworks/:idsubtypeItem',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action' => 'bodyworks'
                    )
                )
            ),
            'cities' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/ajax/cities/:idstate',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action' => 'cities'
                    )
                )
            ),
            'user-delete-ad' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/user/delete/anuncio/:idanuncio',
                    'defaults' => array(
                        'controller' => 'Application\Controller\User',
                        'action' => 'deleteAd',
                    )
                )
            ),
            // Fim Fix Route
            'application' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Index',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                            ),
                            'defaults' => array()
                        )
                    )
                )
            )
        )
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory'
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator'
        )
    ),
    'translator' => array(
        'locale' => 'pt_BR',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo'
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Result' => 'Application\Controller\ResultController',
            'Application\Controller\Portal' => 'Application\Controller\PortalController',
            'Application\Controller\Admin' => 'Application\Controller\AdminController',
            'Application\Controller\User' => 'Application\Controller\UserController',
            'Application\Controller\Ajax' => 'Application\Controller\AjaxController'
        )
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
            'layout/admin' => __DIR__ . '/../view/layout/admin.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array()
        )
    ),
    'doctrine' => array(
        'driver' => array(
            'application_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/Application/Entity'
                )
            ),
            
            'orm_default' => array(
                'drivers' => array(
                    'Application\Entity' => 'application_entities'
                )
            )
        )
    ),
);
