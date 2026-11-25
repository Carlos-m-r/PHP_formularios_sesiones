<?php

namespace App\DTO;

class Contacto
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 3)]
    private string $nombre;
    #[Assert\NotBlank(required: true)]
    #[Assert\Email]
    private string $email;
    #[Assert\Email(required: true)]
    private string $mensaje;
}
