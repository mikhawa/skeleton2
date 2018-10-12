<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Articles
 *
 * @ORM\Table(name="articles", uniqueConstraints={@ORM\UniqueConstraint(name="theslug_UNIQUE", columns={"theslug"})}, indexes={@ORM\Index(name="fk_articles_users_idx", columns={"users_idusers"})})
 * @ORM\Entity
 */
class Articles
{
    /**
     * @var int
     *
     * @ORM\Column(name="idarticles", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idarticles;

    /**
     * @var string
     *
     * @ORM\Column(name="thetitle", type="string", length=150, nullable=false)
     */
    private $thetitle;

    /**
     * @var string
     *
     * @ORM\Column(name="theslug", type="string", length=150, nullable=false)
     */
    private $theslug;

    /**
     * @var string
     *
     * @ORM\Column(name="thedescription", type="text", length=65535, nullable=false)
     */
    private $thedescription;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="thedate", type="datetime", nullable=true)
     */
    private $thedate;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_idusers", referencedColumnName="idusers")
     * })
     */
    private $usersusers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Rubriques", inversedBy="articlesarticles")
     * @ORM\JoinTable(name="articles_has_rubriques",
     *   joinColumns={
     *     @ORM\JoinColumn(name="articles_idarticles", referencedColumnName="idarticles")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="rubriques_idrubriques", referencedColumnName="idrubriques")
     *   }
     * )
     */
    private $rubriquesrubriques;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rubriquesrubriques = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdarticles(): ?int
    {
        return $this->idarticles;
    }

    public function getThetitle(): ?string
    {
        return $this->thetitle;
    }

    public function setThetitle(string $thetitle): self
    {
        $this->thetitle = $thetitle;

        return $this;
    }

    public function getTheslug(): ?string
    {
        return $this->theslug;
    }

    public function setTheslug(string $theslug): self
    {
        $this->theslug = $theslug;

        return $this;
    }

    public function getThedescription(): ?string
    {
        return $this->thedescription;
    }

    public function setThedescription(string $thedescription): self
    {
        $this->thedescription = $thedescription;

        return $this;
    }

    public function getThedate(): ?\DateTimeInterface
    {
        return $this->thedate;
    }

    public function setThedate(?\DateTimeInterface $thedate): self
    {
        $this->thedate = $thedate;

        return $this;
    }

    public function getUsersusers(): ?Users
    {
        return $this->usersusers;
    }

    public function setUsersusers(?Users $usersusers): self
    {
        $this->usersusers = $usersusers;

        return $this;
    }

    /**
     * @return Collection|Rubriques[]
     */
    public function getRubriquesrubriques(): Collection
    {
        return $this->rubriquesrubriques;
    }

    public function addRubriquesrubrique(Rubriques $rubriquesrubrique): self
    {
        if (!$this->rubriquesrubriques->contains($rubriquesrubrique)) {
            $this->rubriquesrubriques[] = $rubriquesrubrique;
        }

        return $this;
    }

    public function removeRubriquesrubrique(Rubriques $rubriquesrubrique): self
    {
        if ($this->rubriquesrubriques->contains($rubriquesrubrique)) {
            $this->rubriquesrubriques->removeElement($rubriquesrubrique);
        }

        return $this;
    }

}
