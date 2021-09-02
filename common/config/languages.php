<?php
use backend\models\Languages;
use yii\db\Command;


function get_languages() {

    $connection  = new yii\db\Connection([
        'dsn' => 'mysql:host=localhost;dbname=advanced.loc',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
    ]);
    $connection->open();
    $sql = "SELECT * FROM languages WHERE active = 1";

    $command = $connection->createCommand($sql);
    $find_languages = $command->queryAll();

    $languages = [];
    foreach ($find_languages as $lang) {
        $languages[$lang['name']] =  $lang['code'];
    }

    return $languages;
}