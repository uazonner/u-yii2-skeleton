<?php
$params = require_once(__DIR__ . '/params.php');
$db     = require_once(__DIR__ . '/db.php');
$mail   = require_once(__DIR__ . '/mail.php');

/* Routing */
$routeBackend  = require_once(__DIR__ . '/route.backend.php');
$routePersonal = require_once(__DIR__ . '/route.personal.php');
$routeFrontend = require_once(__DIR__ . '/route.frontend.php');
$route         = array_merge($routeBackend, $routePersonal, $routeFrontend);

$config = [
    'id'             => 'basic',
    'name'           => 'U Yii2 Skeleton',
    'basePath'       => dirname(__DIR__),
    'timeZone'       => 'Europe/Kiev',
    'sourceLanguage' => 'en',
    'language'       => 'ru',
    'bootstrap'      => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            'baseUrl' => '',
            'cookieValidationKey' => 'lU6MgvZSTB3dMKwfxqvTtCMMMuGQg2dV',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => $mail,
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'enableStrictParsing' => true,
		    'rules'               => $route
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
