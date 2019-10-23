<?php


namespace Application\Controller;

use Application\Entity\Contact;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController
{
   public function listAction()
   {
       $liste = [
           (new Contact())->setId(1)->setPrenom('Romain')->setNom('Bohdanowicz'),
           (new Contact())->setId(2)->setPrenom('Toto')->setNom('Titi'),
       ];
       
       return new ViewModel([
           'contacts' => $liste
       ]);
   }
   
   public function showAction()
   {
       $id = $this->params('id');
       
       return new ViewModel();
   }
   
   public function createAction()
   {
       return new ViewModel();
   }
}
