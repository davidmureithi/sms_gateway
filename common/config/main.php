<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager'=>array(
	        'class' => 'yii\rbac\DbManager',
	        'defaultRoles' => ['end-user'],
	    ),
    ],
];