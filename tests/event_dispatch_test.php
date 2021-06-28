<?php

/**
 * Date: 2021/6/25
 * Describe:
 */

require __DIR__ . '/../vendor/autoload.php';

$e = new \FastElephant\EventHandler\EventHandler(10000001, '123456');

print_r($e->event()->dispatch(['delivery_id' => 18000111]));
