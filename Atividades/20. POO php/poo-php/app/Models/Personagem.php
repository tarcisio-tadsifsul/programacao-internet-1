<?php

// Faz o PHP a respeitar os tipos exatos de dados (int, string, etc.)
declare(strict_types=1);

// Define onde esta classe "vive" no projeto
namespace App\Models;

abstract class Personagem
{

  // Construtor com atributos diretos
  public function __construct(
    protected string $nome,
    protected int $vida,
    protected int $mana,
    protected int $nivel
  ) {}

  // Modificadores
  public function getNome(): string
  {
    return $this->nome;
  }

  // Médotos Concreto
  public function receberDano(int $qtdDano): int
  {
    return $this->vida -= $qtdDano;
  }

  public function recuperarVida(int $itemVida): int
  {
    return $this->vida += $itemVida;
  }

  // Método abstrato
  abstract function atacar(int $vidaInimigo): int;
}
