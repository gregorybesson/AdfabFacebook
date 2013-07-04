<?php

return array(
    'doctrine' => array(
        'driver' => array(
            'adfabfacebook_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => __DIR__ . '/../src/AdfabFacebook/Entity'
            ),

            'orm_default' => array(
                'drivers' => array(
                    'AdfabFacebook\Entity'  => 'adfabfacebook_entity'
                )
            )
        )
    ),

    'translator' => array(
        'locale' => 'fr_FR',
        'translation_file_patterns' => array(
            array(
                'type'         => 'phpArray',
                'base_dir'     => __DIR__ . '/../language',
                'pattern'      => '%s.php',
                'text_domain'  => 'adfabfacebook'
            ),
        ),
    ),

    'view_manager' => array(
        'template_map' => array(
            'adfab-facebook/index/index' => __DIR__ .  '/../view/adfab-facebook/frontend/app.phtml',
        ),
        'template_path_stack' => array(
            'adfabfacebook' => __DIR__ . '/../view',
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'adfabfacebook_admin_app' => 'AdfabFacebook\Controller\App\AdminController',
            'adfabfacebook'       => 'AdfabFacebook\Controller\IndexController',
        ),
    ),

    'router' => array(
        'routes' => array(
        	'frontend' => array(
        		'child_routes' => array(
		            'facebook' => array(
		                'type' => 'Zend\Mvc\Router\Http\Segment',
		                'options' => array(
		                    'route'    => '/face-book',
		                    'defaults' => array(
		                        'controller' => 'adfabfacebook',
		                        'action'     => 'index',
		                    ),
		                ),
		            ),
        		),
        	),
            'zfcadmin' => array(
                'child_routes' => array(
                    'adfabfacebook_admin_app' => array(
                        'type' => 'Literal',
                        'priority' => 1000,
                        'options' => array(
                            'route' => '/app',
                            'defaults' => array(
                                'controller' => 'adfabfacebook_admin_app',
                                'action'     => 'index',
                            ),
                        ),
                        'child_routes' =>array(
                            'list' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/list[/:p]',
                                    'defaults' => array(
                                        'controller' => 'adfabfacebook_admin_app',
                                        'action'     => 'list',
                                    ),
                                ),
                            ),
                            'create' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/create/:appId',
                                    'defaults' => array(
                                        'controller' => 'adfabfacebook_admin_app',
                                        'action'     => 'create',
                                        'appId'     => 0
                                    ),
                                ),
                            ),
                            'edit' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/edit/:appId',
                                    'defaults' => array(
                                        'controller' => 'adfabfacebook_admin_app',
                                        'action'     => 'edit',
                                        'appId'     => 0
                                    ),
                                ),
                            ),
                            'remove' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/remove/:appId',
                                    'defaults' => array(
                                        'controller' => 'adfabfacebook_admin_app',
                                        'action'     => 'remove',
                                        'appId'     => 0
                                    ),
                                ),
                            ),
                            'install' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/install/:appId',
                                    'defaults' => array(
                                        'controller' => 'adfabfacebook_admin_app',
                                        'action'     => 'install',
                                        'appId'     => 0
                                    ),
                                ),
                            ),

                            'uninstall' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/uninstall/:appId',
                                    'defaults' => array(
                                        'controller' => 'adfabfacebook_admin_app',
                                        'action'     => 'uninstall',
                                        'appId'     => 0
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    'core_layout' => array(
        'AdfabFacebook' => array(
            'default_layout' => 'layout/2columns-left',
            'children_views' => array(
                'col_left'  => 'adfab-user/layout/col-user.phtml',
            ),
        ),
    ),

    'navigation' => array(
        'admin' => array(
            'adfabfacebookadmin' => array(
                'order' => 70,
                'label' => 'Facebook',
                'route' => 'zfcadmin/adfabfacebook_admin_app/list',
                'resource' => 'facebook',
                'privilege' => 'list',
                'pages' => array(
                    'list' => array(
                            'label' => 'Liste des Applis',
                            'route' => 'zfcadmin/adfabfacebook_admin_app/list',
                            'resource' => 'facebook',
                            'privilege' => 'list',
                    ),
                    'create' => array(
                        'label' => 'Nouvelle Appli',
                        'route' => 'zfcadmin/adfabfacebook_admin_app/create',
                        'resource' => 'facebook',
                        'privilege' => 'add',
                    ),
                ),
            ),
        ),
    )
);
