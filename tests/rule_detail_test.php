<?php

/**
 * Date: 2021/6/25
 * Describe:
 */

require __DIR__ . '/../vendor/autoload.php';

$e = new \FastElephant\EventHandler\EventHandler(10000100);


print_r($e->rule()->detail('123456'));

