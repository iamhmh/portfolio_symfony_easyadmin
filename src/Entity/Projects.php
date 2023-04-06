<?php

namespace App\Entity;

use App\Entity\ProjectImage;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProjectsRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ProjectsRepository::class)]
class Projects
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ProjectTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $ProjectSubTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $ProjectContent = null;

    #[ORM\OneToMany( mappedBy: 'Projects', targetEntity: ProjectImage::class)]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private Collection $ProjectImage;

    public function __construct()
    {
        $this->ProjectImage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjectTitle(): ?string
    {
        return $this->ProjectTitle;
    }

    public function setProjectTitle(string $ProjectTitle): self
    {
        $this->ProjectTitle = $ProjectTitle;

        return $this;
    }

    public function getProjectSubTitle(): ?string
    {
        return $this->ProjectSubTitle;
    }

    public function setProjectSubTitle(string $ProjectSubTitle): self
    {
        $this->ProjectSubTitle = $ProjectSubTitle;

        return $this;
    }

    public function getProjectContent(): ?string
    {
        return $this->ProjectContent;
    }

    public function setProjectContent(string $ProjectContent): self
    {
        $this->ProjectContent = $ProjectContent;

        return $this;
    }

    /**
     * @return Collection<int, ProjectImage>
     */
    public function getProjectImage(): Collection
    {
        return $this->ProjectImage;
    }

    public function addPicture(ProjectImage $picture): self
    {
        if (!$this->ProjectImage->contains($picture)) {
            $this->ProjectImage->add($picture);
            $picture->setProjects($this);
        }

        return $this;
    }

    public function removePicture(ProjectImage $picture): self
    {
        if ($this->ProjectImage->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getProjects() === $this) {
                $picture->setProjects(null);
            }
        }

        return $this;
    }
}
