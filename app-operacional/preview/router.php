<?php

declare(strict_types=1);

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$fullPath = realpath(__DIR__ . '/..' . $path);
$root = realpath(__DIR__ . '/..');

if ($path !== '/' && $fullPath && str_starts_with($fullPath, $root) && is_file($fullPath)) {
    return false;
}

require __DIR__ . '/index.php';
