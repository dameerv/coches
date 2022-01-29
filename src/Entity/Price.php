<?php

namespace App\Entity;

use App\Repository\PriceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PriceRepository::class)]
class Price
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'datetime_immutable', nullable: false)]
    private \DateTimeImmutable $postAt;

    #[ORM\Column(type: 'bigint', nullable: false)]
    private string $value;

    #[ORM\Column(type: 'string', length: 3, nullable: false)]
    private string $currencyCode;

    #[ORM\ManyToOne(targetEntity: Ad::class, inversedBy: 'prices')]
    #[ORM\Column(nullable: false)]
    private Ad $ad;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPostAt(): ?\DateTimeImmutable
    {
        return $this->postAt;
    }

    public function setPostAt(\DateTimeImmutable $postAt): self
    {
        $this->postAt = $postAt;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    public function setCurrencyCode(string $currencyCode): self
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    public function getAd(): ?Ad
    {
        return $this->ad;
    }

    public function setAd(?Ad $ad): self
    {
        $this->ad = $ad;

        return $this;
    }
}
