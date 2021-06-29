<?php

/**
 * Date: 2021/6/25
 * Describe:
 */

require __DIR__ . '/../vendor/autoload.php';


$e1 = new \FastElephant\EventHandler\EventHandler();

print_r($e1->event()->dispatch(['url' => '', 'body' => [], 'method' => 'post', 'header' => [], 'delay' => 5]));

$e2 = new \FastElephant\EventHandler\EventHandler(10000010, '123456');

print_r($e2->event()->dispatch(['delivery_id' => 18000111]));
