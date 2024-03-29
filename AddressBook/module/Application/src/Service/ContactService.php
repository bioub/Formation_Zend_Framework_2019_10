<?php

namespace Application\Service;

use Application\Entity\Contact;
use Doctrine\ORM\EntityManager;

class ContactService
{
    /** @var EntityManager */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function getAll()
    {
        $repo = $this->em->getRepository(Contact::class);
        return $repo->findAll();
    }
    
    public function getById($id)
    {
        $repo = $this->em->getRepository(Contact::class);
        return $repo->find($id);
    }
    
    public function save($contact)
    {
        if (is_array($contact)) {
            $data = $contact;
            $hydrator = new \DoctrineModule\Stdlib\Hydrator\DoctrineObject($this->em);
            $contact = new \Application\Entity\Contact();
            
            $hydrator->hydrate($data, $contact);
        }
        
        $this->em->persist($contact);
        $this->em->flush();
    }
    
    public function getForm() {
        return new \Application\Form\ContactForm($this->em);
    }

}
