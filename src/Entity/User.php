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
        #[ORM\Column(length: 255)]
        private string $firstname,
        #[ORM\Column(length: 255)]
        private string $lastname
    )
    {}

}
