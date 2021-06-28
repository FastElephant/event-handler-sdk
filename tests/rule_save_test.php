<?php

/**
 * Date: 2021/6/25
 * Describe:
 */

require __DIR__ . '/../vendor/autoload.php';

$e = new \FastElephant\EventHandler\EventHandler(10000100, '123456');


$rules = [
    ['capacity_type' => 1, 'gratuity' => 1, 'delay' => 60],
    ['capacity_type' => 2, 'gratuity' => 2, 'delay' => 120],
    ['capacity_type' => 3, 'gratuity' => 3, 'delay' => 30],
    ['capacity_type' => 4, 'gratuity' => 4, 'delay' => 180],
];

$e->rule()->save(1, $rules);


