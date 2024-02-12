<?php

namespace App\Entity;

use App\Repository\LooksRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: LooksRepository::class)]
class Looks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['look:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['look:read'])]
    private ?string $brand = null;

    #[ORM\Column]
    #[Groups(['look:read'])]
    private array $tags = [];

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['look:read'])]
    private ?string $season = null;

    #[ORM\Column(length: 255)]
    #[Groups(['look:read'])]
    private ?string $fileUrl = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->Brand = $brand;

        return $this;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function setTags(array $tags): static
    {
        $this->tags = $tags;

        return $this;
    }

    public function getSeason(): ?string
    {
        return $this->season;
    }

    public function setSeason(?string $season): static
    {
        $this->season = $season;

        return $this;
    }

    public function getFileUrl(): ?string
    {
        return $this->fileUrl;
    }

    public function setFileUrl(string $fileUrl): static
    {
        $this->fileUrl = $fileUrl;

        return $this;
    }
}
