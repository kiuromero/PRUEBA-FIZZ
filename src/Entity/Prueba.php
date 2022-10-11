<?php

namespace App\Entity;

use App\Repository\PruebaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PruebaRepository::class)]
class Prueba
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numero_inicial = null;

    #[ORM\Column]
    private ?int $numero_final = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha_registro = null;

    #[ORM\Column(length: 255)]
    private ?string $fizz_buzz = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroInicial(): ?int
    {
        return $this->numero_inicial;
    }

    public function setNumeroInicial(int $numero_inicial): self
    {
        $this->numero_inicial = $numero_inicial;

        return $this;
    }

    public function getNumeroFinal(): ?int
    {
        return $this->numero_final;
    }

    public function setNumeroFinal(int $numero_final): self
    {
        $this->numero_final = $numero_final;

        return $this;
    }

    public function getFechaRegistro(): ?\DateTimeInterface
    {
        return $this->fecha_registro;
    }

    public function setFechaRegistro(\DateTimeInterface $fecha_registro): self
    {
        $this->fecha_registro = $fecha_registro;

        return $this;
    }

    public function getFizzBuzz(): ?string
    {
        return $this->fizz_buzz;
    }

    public function setFizzBuzz(string $fizz_buzz): self
    {
        $this->fizz_buzz = $fizz_buzz;

        return $this;
    }
}
