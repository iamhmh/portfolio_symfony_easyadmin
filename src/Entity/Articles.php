<?php

namespace App\Entity;

use App\Entity\BlogImage;
use App\Repository\ArticlesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
class Articles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 255)]
    private ?string $SubTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $Slug = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Content = null;

    #[ORM\Column(length: 255)]
    private ?string $WrittenBy = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $CreatedAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $UpdatedAt = null;

    #[ORM\OneToMany( mappedBy: 'Articles', targetEntity: BlogImage::class)]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private Collection $BlogImage;

    public function __construct()
    {
        $this->BlogImage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getSubTitle(): ?string
    {
        return $this->SubTitle;
    }

    public function setSubTitle(string $SubTitle): self
    {
        $this->SubTitle = $SubTitle;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->Slug;
    }

    public function setSlug(string $Slug): self
    {
        $this->Slug = $Slug;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->Content;
    }

    public function setContent(string $Content): self
    {
        $this->Content = $Content;

        return $this;
    }

    public function getWrittenBy(): ?string
    {
        return $this->WrittenBy;
    }

    public function setWrittenBy(string $WrittenBy): self
    {
        $this->WrittenBy = $WrittenBy;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeImmutable $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $UpdatedAt): self
    {
        $this->UpdatedAt = $UpdatedAt;

        return $this;
    }

    /**
     * @return Collection<int, BlogImage>
     */
    public function getBlogImage(): Collection
    {
        return $this->BlogImage;
    }

    public function addPicture(BlogImage $picture): self
    {
        if (!$this->BlogImage->contains($picture)) {
            $this->BlogImage->add($picture);
            $picture->setArticles($this);
        }

        return $this;
    }

    public function removePicture(BlogImage $picture): self
    {
        if ($this->BlogImage->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getArticles() === $this) {
                $picture->setArticles(null);
            }
        }

        return $this;
    }
}
