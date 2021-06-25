<?php

/**
 * Date: 2021/6/25
 * Describe:
 */

require __DIR__ . '/../vendor/autoload.php';

$e = new \FastElephant\EventHandler\EventHandler(1000, '22222222');

try {
    print_r($e->event()->dispatch('222222'));
} catch (\Exception $e) {
    print_r($e->getMessage());
}

