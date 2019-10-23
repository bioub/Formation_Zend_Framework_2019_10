<?php

$sm = new Zend\ServiceManager\ServiceManager();

$sm->setFactory('writer', function() {
    return new \Orsys\Writer\FileWriter('app.log');
});

$sm->setFactory(\Orsys\Log\Logger::class, function($sm) {
    $writer = $sm->get('writer');
    return new \Orsys\Log\Logger($writer);
});

return $sm;