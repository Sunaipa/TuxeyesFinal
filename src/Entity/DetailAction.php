<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DetailActionRepository")
 */
class DetailAction
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
    private $detail;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ActionExpPro", inversedBy="details")
     */
    private $actionExpPro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function getActionExpPro(): ?ActionExpPro
    {
        return $this->actionExpPro;
    }

    public function setActionExpPro(?ActionExpPro $actionExpPro): self
    {
        $this->actionExpPro = $actionExpPro;

        return $this;
    }
}
