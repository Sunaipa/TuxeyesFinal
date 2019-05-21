<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompetenceRepository")
 */
class Competence
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
    private $titre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeComp", inversedBy="competences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeComp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getTypeComp(): ?TypeComp
    {
        return $this->typeComp;
    }

    public function setTypeComp(?TypeComp $typeComp): self
    {
        $this->typeComp = $typeComp;

        return $this;
    }
}
