<?php

namespace App\Entity;

use App\Repository\AdRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdRepository::class)]
class Ad
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $title;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description;

    #[ORM\Column(type: 'datetime_immutable')]
    private ?\DateTimeImmutable $postDate;

    #[ORM\Column(type: 'boolean')]
    private ?bool $isActive;

    #[ORM\ManyToOne(targetEntity: AdOwner::class, inversedBy: 'ads')]
    #[ORM\JoinColumn(nullable: false)]
    private ?AdOwner $owner;

    #[ORM\OneToMany(mappedBy: 'Ad', targetEntity: Price::class)]
    private ArrayCollection $prices;

    #[ORM\OneToOne(inversedBy: 'ad', targetEntity: Price::class, cascade: ['persist', 'remove'])]
    private ?Price $price;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $updatedAt;

    #[ORM\ManyToOne(targetEntity: Country::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Country $country;

    #[ORM\ManyToOne(targetEntity: City::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?City $city;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $addres;

    public function __construct()
    {
        $this->prices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getPostDate(): ?\DateTimeImmutable
    {
        return $this->postDate;
    }

    public function setPostDate(\DateTimeImmutable $postDate): self
    {
        $this->postDate = $postDate;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getOwner(): ?AdOwner
    {
        return $this->owner;
    }

    public function setOwner(?AdOwner $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection|Price[]
     */
    public function getPrices(): Collection
    {
        return $this->prices;
    }

    public function addPrice(Price $price): self
    {
        if (!$this->prices->contains($price)) {
            $this->prices[] = $price;
            $price->setAd($this);
        }

        return $this;
    }

    public function removePrice(Price $price): self
    {
        if ($this->prices->removeElement($price)) {
            // set the owning side to null (unless already changed)
            if ($price->getAd() === $this) {
                $price->setAd(null);
            }
        }

        return $this;
    }

    public function getPrice(): ?Price
    {
        return $this->price;
    }

    public function setPrice(?Price $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

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

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddres(): ?string
    {
        return $this->addres;
    }

    public function setAddres(?string $addres): self
    {
        $this->addres = $addres;

        return $this;
    }
}
