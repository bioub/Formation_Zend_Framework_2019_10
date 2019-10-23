<?php
require_once __DIR__ . '/../vendor/autoload.php';

$env = getenv('PHP_ENV') ? getenv('PHP_ENV') : 'dev';

$container = require __DIR__ . "/../services/$env.php";

$logger = $container->get(\Orsys\Log\Logger::class);
$logger->info('Info');