<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CityRepository::class)]
#[ORM\Index(fields: ["name", "slug", "coordLat", "coordLong" ])]
class City
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Region::class, inversedBy: 'cities')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Region $region;

    #[ORM\ManyToOne(targetEntity: Country::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Country $country;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $slug;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $coordLat;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $coordLong;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $isActive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCoordLat(): ?float
    {
        return $this->coordLat;
    }

    public function setCoordLat(?float $coordLat): self
    {
        $this->coordLat = $coordLat;

        return $this;
    }

    public function getCoordLong(): ?float
    {
        return $this->coordLong;
    }

    public function setCoordLong(?float $coordLong): self
    {
        $this->coordLong = $coordLong;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }
}
