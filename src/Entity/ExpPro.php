<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExpProRepository")
 */
class ExpPro
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Le nom est obligatoire !")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Un titre est obligatoire !")
     * @Assert\Length(min=3, max=255, minMessage="Titre trop court !", maxMessage="Titre trop long !")
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le lieu est obligatoire !")
     * @Assert\Length(min=2, max=255, minMessage="Nom du lieu est trop court !", maxMessage="Nom du lieu est trop long !")
     */
    private $lieu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(min=3, max=255, minMessage="Description trop courte !", maxMessage="Description trop longue !")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=6000)
     * @Assert\NotBlank(message="Le corp ne doit pas etre vide")
     * @Assert\Length(min=3, max=6000, minMessage="Corp trop court !", maxMessage="Corp trop long !")
     */
    private $corp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
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

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCorp(): ?string
    {
        return $this->corp;
    }

    public function setCorp(string $corp): self
    {
        $this->corp = $corp;

        return $this;
    }
}
