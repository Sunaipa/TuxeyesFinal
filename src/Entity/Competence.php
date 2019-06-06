<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Length(min=3, max=255, minMessage="Texte de compétence trop court !", maxMessage="Text de compétence trop long !")
     * @Assert\NotBlank(message="Le champ est obligatoire !")
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
