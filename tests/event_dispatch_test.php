<?php

/**
 * Date: 2021/6/25
 * Describe:
 */

require __DIR__ . '/../vendor/autoload.php';


$e1 = new \FastElephant\EventHandler\EventHandler();

$d1 = [
    ['url' => 'https://psapi.songjianxia.com/event-callback', 'body' => ['name'=>'王'], 'method' => 'get', 'header' => ['Content-Type'=>'application/x-www-form-urlencoded'], 'delay' => 5]
];

$e1->event()->dispatch($d1);

exit;

$e2 = new \FastElephant\EventHandler\EventHandler(10000100);

$d2 = [
    ['delivery_order_id' => 18000111, 'capacity_types' => [1, 4], 'merchant_id' => 123456],
];

$e2->event()->dispatch($d2);
