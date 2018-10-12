<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Rubriques
 *
 * @ORM\Table(name="rubriques")
 * @ORM\Entity
 */
class Rubriques
{
    /**
     * @var int
     *
     * @ORM\Column(name="idrubriques", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrubriques;

    /**
     * @var string|null
     *
     * @ORM\Column(name="thertitle", type="string", length=60, nullable=true)
     */
    private $thertitle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Articles", mappedBy="rubriquesrubriques")
     */
    private $articlesarticles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articlesarticles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdrubriques(): ?int
    {
        return $this->idrubriques;
    }

    public function getThertitle(): ?string
    {
        return $this->thertitle;
    }

    public function setThertitle(?string $thertitle): self
    {
        $this->thertitle = $thertitle;

        return $this;
    }

    /**
     * @return Collection|Articles[]
     */
    public function getArticlesarticles(): Collection
    {
        return $this->articlesarticles;
    }

    public function addArticlesarticle(Articles $articlesarticle): self
    {
        if (!$this->articlesarticles->contains($articlesarticle)) {
            $this->articlesarticles[] = $articlesarticle;
            $articlesarticle->addRubriquesrubrique($this);
        }

        return $this;
    }

    public function removeArticlesarticle(Articles $articlesarticle): self
    {
        if ($this->articlesarticles->contains($articlesarticle)) {
            $this->articlesarticles->removeElement($articlesarticle);
            $articlesarticle->removeRubriquesrubrique($this);
        }

        return $this;
    }

}
