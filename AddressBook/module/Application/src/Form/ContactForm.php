<?php

namespace Application\Form;

use DoctrineModule\Form\Element\ObjectSelect;
use DoctrineORMModule\Proxy\__CG__\Application\Entity\Societe;
use Zend\Form\Element\Email;
use Zend\Form\Element\Tel;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class ContactForm extends Form
{
   
    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        parent::__construct('contact');
        
        // $this->setAttribute('novalidate', 'novalidate');

        $element = new Text('prenom');
        $element->setLabel('Prénom');
        $this->add($element);

        $element = new Text('nom');
        $element->setLabel('Nom');
        $this->add($element);

        $element = new Email('email');
        $element->setLabel('Email');
        $this->add($element);

        $element = new Tel('telephone');
        $element->setLabel('Téléphone');
        $this->add($element);

        $this->add([
            'type' => ObjectSelect::class,
            'name' => 'societe',
            'options' => [
                'label' => 'Société',
                'object_manager' => $em,
                'target_class' => Societe::class,
                'property' => 'nom',
                'display_empty_item' => true,
                'empty_item_label' => '-- Pas de société --',
            ],
        ]);
    }

    public function init(): void
    {
        
    }

}
