<?php

namespace App\Entity;

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

}
