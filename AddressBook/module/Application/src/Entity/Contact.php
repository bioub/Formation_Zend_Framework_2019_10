<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contact")
 */
class Contact
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=40)
     */
    protected $prenom;

    /**
     * @var string
     * @ORM\Column(type="string", length=40)
     */
    protected $nom;

    /**
     * @var string
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    protected $email;

    /**
     * @var string
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $telephone;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\Societe")
     */
    protected $societe;

    public function getId()
    {
        return $this->id;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function getSociete(): ?Societe
    {
        return $this->societe;
    }

    public function setSociete(Societe $societe)
    {
        $this->societe = $societe;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }

}
