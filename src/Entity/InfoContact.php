<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InfoContactRepository")
 */
class InfoContact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le nom est obligatoire !")
     * @Assert\Length(min=3, max=255, minMessage="Nom trop court !", maxMessage="Nom trop long !")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Assert\Length(max=20, maxMessage="Numéro de telephone trop long !" )
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255, maxMessage="Nom d'entreprise trop long")
     */
    private $entreprise;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(message ="Adresse E-mail non valide",
     *               mode ="html5" )
     * @Assert\Length(max=255, maxMessage="Adresse E-mail trop longue")
     * @Assert\NotBlank(message="Un mail est obligatoire !")
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=5000)
     * @Assert\Length(max=5000, maxMessage="Message trop long (max = 5000)")
     * @Assert\NotBlank(message="Un message est obligatoire !")
     */
    private $message;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEnvoi;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getEntreprise(): ?string
    {
        return $this->entreprise;
    }

    public function setEntreprise(?string $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->dateEnvoi;
    }

    public function setDateEnvoi(\DateTimeInterface $dateEnvoi): self
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }
}
