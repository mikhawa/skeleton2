<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Roles
 *
 * @ORM\Table(name="roles", uniqueConstraints={@ORM\UniqueConstraint(name="thename_UNIQUE", columns={"thename"})})
 * @ORM\Entity
 */
class Roles
{
    /**
     * @var int
     *
     * @ORM\Column(name="idroles", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idroles;

    /**
     * @var string
     *
     * @ORM\Column(name="thename", type="string", length=60, nullable=false)
     */
    private $thename;

    /**
     * @var string
     *
     * @ORM\Column(name="thevalue", type="string", length=250, nullable=false)
     */
    private $thevalue;

    public function getIdroles(): ?int
    {
        return $this->idroles;
    }

    public function getThename(): ?string
    {
        return $this->thename;
    }

    public function setThename(string $thename): self
    {
        $this->thename = $thename;

        return $this;
    }

    public function getThevalue(): ?string
    {
        return $this->thevalue;
    }

    public function setThevalue(string $thevalue): self
    {
        $this->thevalue = $thevalue;

        return $this;
    }


}
