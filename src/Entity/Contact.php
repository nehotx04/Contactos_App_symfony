<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $number;

    #[ORM\ManyToOne(targetEntity: Referido::class, cascade: ['persist', 'persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private $referido_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getReferidoId(): ?Referido
    {
        return $this->referido_id;
    }

    public function setReferidoId(Referido $referido_id): self
    {
        $this->referido_id = $referido_id;

        return $this;
    }

    public function getReferido_id(): ?Referido
    {
        return $this->referido_id;
    }

    public function setReferido_id(Referido $referido_id): self
    {
        $this->referido_id = $referido_id;

        return $this;
    }

    // public function isReferidoId()
}
