<?php

namespace App\Entity;

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

}
