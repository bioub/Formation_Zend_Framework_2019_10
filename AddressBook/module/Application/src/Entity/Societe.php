<?php

namespace Application\Entity;

class Societe {
    /** @var int */
    protected $id;
    
    /** @var string */
    protected $nom;
    
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNom($nom) {
        $this->nom = $nom;
        return $this;
    }


}
