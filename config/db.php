<?php

return [
//    'class' => 'yii\db\Connection',
//    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
//    'username' => 'root',
//    'password' => '',
//    'charset' => 'utf8',




    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;port=5432;dbname=testyii',
    'username' => 'postgres',
    'password' => '',
    'charset' => 'utf8',

//    кеширования схемы
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 3600,

    'schemaMap' => [
        'pgsql'=> [
            'class'=>'yii\db\pgsql\Schema',
            'defaultSchema' => 'public' //specify your schema here
        ]
    ],


];
