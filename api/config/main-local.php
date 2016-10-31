<?php

$config = [
    'components' => [
        'db' => [
          'class' => 'yii\db\Connection',
          'dsn' => 'mysql:host=***HOST***;dbname=***DB NAME***',
          'username' => '***USER NAME***',
          'password' => '***PASSWORD***',
          'charset' => 'utf8',
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
