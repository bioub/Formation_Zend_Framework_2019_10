<?php

use Orsys\Log\Logger;
use Orsys\Writer\FileWriter;

require_once __DIR__ . '/../vendor/autoload.php';

$writer = new FileWriter('app.log');
$logger = new Logger($writer);
$logger->info('Line from Logger');

// SOLID
// * Single Responsability
// * Open / Close
// Liskov Substitution
// Interface Seggration
// * Dependency Inversion Principle
