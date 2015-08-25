<?php
/**
 * main.php
 * @author Roman Revin http://phptime.ru
 */

return [
    'id' => 'testapp',
    'basePath' => realpath(__DIR__ . '/..'),
    'modules' => [
        'comments' => [
            'class' => 'nelli7\yii\module\Comments\Module',
            'userIdentityClass' => 'nelli7\yii\module\Comments\tests\unit\models\User',
        ],
    ]
];