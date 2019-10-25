<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Service;

use Application\Entity\Societe;
use Doctrine\ORM\EntityManager;

/**
 * Description of SocieteService
 *
 * @author Administrateur
 */
class SocieteService
{
    /** @var EntityManager */
    protected $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getAll()
    {
        $repo = $this->em->getRepository(Societe::class);
        return $repo->findAll();
    }
    
    public function getById($id)
    {
        $repo = $this->em->getRepository(Societe::class);
        return $repo->find($id);
    }
}
