<?php

return [
    'components' => [
        'authManager' => [
                 'class' => 'yii\rbac\DbManager',
             ],
        'db' => [
            'class' => 'yii\db\Connection',

            //'dsn' => 'mysql:host=bd.visaodofuturocv.com;port=3306;dbname=bd_visaocv',

            'dsn' => 'mysql:host=localhost;port=3306;dbname=visaodofuturo;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',

            /*'dsn' => 'mysql:host=bd.visaodofuturocv.com;dbname=bd_visaocv',
            'username' => 'user_visaocv',
            'password' => 'Pa$$w0rd',
            'charset' => 'utf8',*/
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
