<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActionExpProRepository")
 */
class ActionExpPro
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
    private $action;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ExpPro", inversedBy="actions")
     */
    private $expPro;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DetailAction", mappedBy="actionExpPro")
     */
    private $details;

    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getExpPro(): ?ExpPro
    {
        return $this->expPro;
    }

    public function setExpPro(?ExpPro $expPro): self
    {
        $this->expPro = $expPro;

        return $this;
    }

    /**
     * @return Collection|DetailAction[]
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(DetailAction $detail): self
    {
        if (!$this->details->contains($detail)) {
            $this->details[] = $detail;
            $detail->setActionExpPro($this);
        }

        return $this;
    }

    public function removeDetail(DetailAction $detail): self
    {
        if ($this->details->contains($detail)) {
            $this->details->removeElement($detail);
            // set the owning side to null (unless already changed)
            if ($detail->getActionExpPro() === $this) {
                $detail->setActionExpPro(null);
            }
        }

        return $this;
    }
}
