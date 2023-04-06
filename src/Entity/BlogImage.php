<?php

namespace App\Entity;

use Serializable;
use App\Repository\BlogImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: BlogImageRepository::class)]
#[Vich\Uploadable]
class BlogImage implements Serializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ImageName = null;

    #[Vich\UploadableField(mapping: 'Articles', fileNameProperty: 'ImageName', size: 'ImageSize')]
    private ?File $ImageFile = null;

    #[ORM\Column]
    private ?int $ImageSize = null;

    #[ORM\Column(length: 255)]
    private ?string $Alt = null;

    #[ORM\ManyToOne(inversedBy: 'BlogImage')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Articles $Articles = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlt(): ?string
    {
        return $this->Alt;
    }

    public function setAlt(string $Alt): self
    {
        $this->Alt = $Alt;

        return $this;
    }

    public function getArticles(): ?Articles
    {
        return $this->Articles;
    }

    public function setArticles(?Articles $Articles): self
    {
        $this->Articles = $Articles;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $ImageFile
     */
    public function setImageFile(?File $ImageFile = null): void
    {
        $this->ImageFile = $ImageFile;

    }

    public function getImageFile(): ?File
    {
        return $this->ImageFile;
    }

    public function setImageName(?string $ImageName): void
    {
        $this->ImageName = $ImageName;
    }

    public function getImageName(): ?string
    {
        return $this->ImageName;
    }

    public function setImageSize(?int $ImageSize): void
    {
        $this->ImageSize = $ImageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->ImageSize;
    }

    
    public function serialize(): string
    {
        return serialize(
            array(
                $this->id,
                $this->ImageName,
                $this->Alt,
            )
        );
    }

    public function unserialize(string $serialized)
    {
        list (
            $this->id,
            $this->ImageName,
            $this->Alt,
            ) = unserialize($serialized, array('allowed_classes' => false));
    }
}
