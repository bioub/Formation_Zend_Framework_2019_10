<?php

namespace Orsys\Entity;

class Contact {
    /** @var int */
    protected $id;
    
    /** @var string */
    protected $prenom;
    
    /** @var string */
    protected $nom;
    
    /** @var Societe */
    protected $societe;
    
    public function getId() {
        return $this->id;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
        return $this;
    }

    public function setNom($nom) {
        $this->nom = $nom;
        return $this;
    }

    public function getSociete(): Societe {
        return $this->societe;
    }

    public function setSociete(Societe $societe) {
        $this->societe = $societe;
        return $this;
    }


}
