<?php

use Zend\Log\Logger;

require_once __DIR__ . '/../vendor/autoload.php';

$sw = new \Zend\Log\Writer\Stream('app.log');
$logger = new Logger();
$logger->addWriter($sw);
$psrLogger = new \Zend\Log\PsrLoggerAdapter($logger);

$psrLogger->info('Line from Logger');