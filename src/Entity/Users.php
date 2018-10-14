<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="login_UNIQUE", columns={"thelogin"})}, indexes={@ORM\Index(name="fk_users_roles1_idx", columns={"roles_idroles"})})
 * @ORM\Entity
 */
class Users
{
    /**
     * @var int
     *
     * @ORM\Column(name="idusers", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idusers;

    /**
     * @var string
     *
     * @ORM\Column(name="thelogin", type="string", length=80, nullable=false)
     */
    private $thelogin;

    /**
     * @var string
     *
     * @ORM\Column(name="thepwd", type="string", length=60, nullable=false, options={"fixed"=true})
     */
    private $thepwd;

    /**
     * @var string
     *
     * @ORM\Column(name="themail", type="string", length=200, nullable=false)
     */
    private $themail;

    /**
     * @var \Roles
     *
     * @ORM\ManyToOne(targetEntity="Roles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="roles_idroles", referencedColumnName="idroles")
     * })
     */
    private $rolesroles;

    public function getIdusers(): ?int
    {
        return $this->idusers;
    }

    public function getThelogin(): ?string
    {
        return $this->thelogin;
    }

    public function setThelogin(string $thelogin): self
    {
        $this->thelogin = $thelogin;

        return $this;
    }

    public function getThepwd(): ?string
    {
        return $this->thepwd;
    }

    public function setThepwd(string $thepwd): self
    {
        $this->thepwd = $thepwd;

        return $this;
    }

    public function getThemail(): ?string
    {
        return $this->themail;
    }

    public function setThemail(string $themail): self
    {
        $this->themail = $themail;

        return $this;
    }

    public function getRolesroles(): ?Roles
    {
        return $this->rolesroles;
    }

    public function setRolesroles(?Roles $rolesroles): self
    {
        $this->rolesroles = $rolesroles;

        return $this;
    }
    
    public function __toString()
    {
        return (string) $this->getThelogin();
    }

}
