<?php

/**
 * Date: 2021/6/25
 * Describe:
 */

require __DIR__ . '/../vendor/autoload.php';

$e = new \FastElephant\EventHandler\EventHandler(10000100, '123456');


$e->rule()->save(1, [['key'=>'222','value'=>'3333']]);


