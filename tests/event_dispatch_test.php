<?php

/**
 * Date: 2021/6/25
 * Describe:
 */

require __DIR__ . '/../vendor/autoload.php';


/*$e1 = new \FastElephant\EventHandler\EventHandler();

print_r($e1->event()->dispatch(['url' => '', 'body' => [], 'method' => 'post', 'header' => [], 'delay' => 5]));*/

$e2 = new \FastElephant\EventHandler\EventHandler(10000100);

$d = [
    ['delivery_order_id' => 18000111, 'capacity_types' => [1, 4], 'merchant_id' => 123455],
];

print_r($e2->event()->dispatch($d));
