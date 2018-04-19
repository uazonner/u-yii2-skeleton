<?php

return [
    'class'         => 'yii\swiftmailer\Mailer',
    'viewPath'      => '@app/mail',
    'htmlLayout'    => 'layouts/main_html',
    'textLayout'    => 'layouts/main_text',
    'messageConfig' => [
        'charset' => 'UTF-8',
    ],
    'transport' => [
        'class'      => 'Swift_SmtpTransport',
        'host'       => 'host',
        'username'   => 'mail',
        'password'   => 'pass',
        'port'       => '465',
        'encryption' => 'ssl',
    ],
    'useFileTransport' => true
];
