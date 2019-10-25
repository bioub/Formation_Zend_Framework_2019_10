<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="societe")
 */
class Societe {
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /**
     * @var string
     * @ORM\Column(type="string", length=80)
     */
    protected $nom;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $adresse;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Application\Entity\Contact", mappedBy="societe")
     */
    protected $contacts;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contacts = new \Doctrine\Common\Collections\ArrayCollection();
    }


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

    /**
     * @return string
     */
    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     * @return Societe
     */
    public function setAdresse(string $adresse): Societe
    {
        $this->adresse = $adresse;
        return $this;
    }



/**
     * Add contact.
     *
     * @param \Application\Entity\Contact $contact
     *
     * @return Societe
     */
    public function addContact(\Application\Entity\Contact $contact)
    {
        $this->contacts[] = $contact;

        return $this;
    }

    /**
     * Remove contact.
     *
     * @param \Application\Entity\Contact $contact
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeContact(\Application\Entity\Contact $contact)
    {
        return $this->contacts->removeElement($contact);
    }

    /**
     * Get contacts.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContacts()
    {
        return $this->contacts;
    }
}
