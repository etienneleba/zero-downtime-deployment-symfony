<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @param string|null $firstname
     * @param string|null $lastname
     */
    public function __construct(
        #[ORM\Column(length: 255, name: "first_name")]
        private string $firstname,
        #[ORM\Column(length: 255)]
        private string $lastname
    )
    {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }


}
