<?php

namespace App\Entity;

use App\Repository\AdOwnerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 * Прослойка между Ad и User определяющая юзера как создателя объявления.
 */
#[ORM\Entity(repositoryClass: AdOwnerRepository::class)]
class AdOwner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\OneToOne(targetEntity: User::class, cascade: ['persist', 'remove'],)]
    #[Orm\Column( nullable: false)]
    private User $user;

    #[ORM\OneToMany(mappedBy: 'owner', targetEntity: Ad::class)]
    private ArrayCollection $ads;

    #[ORM\Column(type: 'string', length: 15, nullable: false)]
    private ?string $phoneNumber;

    #[Pure] public function __construct()
    {
        $this->ads = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getAds(): Collection
    {
        return $this->ads;
    }

    public function addAd(Ad $ad): self
    {
        if (!$this->ads->contains($ad)) {
            $this->ads[] = $ad;
            $ad->setOwner($this);
        }

        return $this;
    }

    /**
     * @param Ad $ad
     * @return $this
     */
    public function removeAd(Ad $ad): self
    {
        if ($this->ads->removeElement($ad)) {
            // set the owning side to null (unless already changed)
            if ($ad->getOwner() === $this) {
                $ad->setOwner(null);
            }
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return $this
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    #[Pure]
    public function getEmail(): ?string
    {
        if(isset($this->user)){
            return $this->user->getEmail();
        }

        return null;
    }
}
