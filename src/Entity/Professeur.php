<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfesseurRepository")
 */
class Professeur
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
    private $professeurName;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Matiere", cascade={"persist", "remove"})
     */
    private $MatiereEnseigner;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $professeurFirstName;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Classe", inversedBy="professeurs")
     */
    private $EnseigneClasses;

    public function __construct()
    {
        $this->EnseigneClasses = new ArrayCollection();
        $this->matieres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProfesseurName(): ?string
    {
        return $this->professeurName;
    }

    public function setProfesseurName(string $professeurName): self
    {
        $this->professeurName = $professeurName;

        return $this;
    }

    
    public function __toString()
    {
        return $this->getProfesseurName().' '.$this->getProfesseurFirstName().' '. "enseigne ".$this->getMatiereEnseigner();

    }

    

    public function getMatiereEnseigner(): ?Matiere
    {
        return $this->MatiereEnseigner;
    }

    public function setMatiereEnseigner(?Matiere $MatiereEnseigner): self
    {
        $this->MatiereEnseigner = $MatiereEnseigner;

        return $this;
    }

    public function getProfesseurFirstName(): ?string
    {
        return $this->professeurFirstName;
    }

    public function setProfesseurFirstName(string $professeurFirstName): self
    {
        $this->professeurFirstName = $professeurFirstName;

        return $this;
    }

    /**
     * @return Collection|Classe[]
     */
    public function getEnseigneClasses(): Collection
    {
        return $this->EnseigneClasses;
    }

    public function addEnseigneClass(Classe $enseigneClass): self
    {
        if (!$this->EnseigneClasses->contains($enseigneClass)) {
            $this->EnseigneClasses[] = $enseigneClass;
        }

        return $this;
    }

    public function removeEnseigneClass(Classe $enseigneClass): self
    {
        if ($this->EnseigneClasses->contains($enseigneClass)) {
            $this->EnseigneClasses->removeElement($enseigneClass);
        }

        return $this;
    }

   
    

    
}
