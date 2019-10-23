<?php

$sm = new Zend\ServiceManager\ServiceManager();

$sm->setFactory('writer', function() {
    return new \Orsys\Writer\NullWriter();
});

$sm->setFactory(\Orsys\Log\Logger::class, function($sm) {
    $writer = $sm->get('writer');
    return new \Orsys\Log\Logger($writer);
});

return $sm; 