<?php

use Orsys\Entity\Contact;
use Orsys\Entity\Societe;


require_once __DIR__ . '/../vendor/autoload.php';

// Orsys\Entity\Contact -> Fully Qualified ClassName (FQCN ou FQN)
$romain = new Contact();
$romain->setPrenom('Romain');

$orsys = new Societe();
$orsys->setNom('Orsys');
$romain->setSociete($orsys);

// Vue (View) / Template / Rendu
echo $romain->getPrenom() . "\n";
echo $romain->getSociete()->getNom() . "\n";