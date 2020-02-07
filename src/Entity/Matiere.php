<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatiereRepository")
 */
class Matiere
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $matiereNAme;


   
  

    public function __construct()
    {
        $this->professeurs = new ArrayCollection();
        $this->matieres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatiereNAme(): ?string
    {
        return $this->matiereNAme;
    }

    public function setMatiereNAme(string $matiereNAme): self
    {
        $this->matiereNAme = $matiereNAme;

        return $this;
    }
    public function __toString()
    {
        return $this->matiereNAme;
    }

   

   
  
}
