<?php

// Faz o PHP a respeitar os tipos exatos de dados (int, string, etc.)
declare(strict_types=1);

// Define onde esta classe "vive" no projeto
namespace App\Models;

abstract class Personagem
{

  // Construtor com atributos diretos
  public function __construct(
    protected string $nome = '',
    protected int $vida = 0,
    protected int $nivel = 0
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

  public function mostrarPersonagem(): string
  {
    return "
      Nome: {$this->nome} <br>
      PV: {$this->vida} <br>
      Nível: {$this->nivel}
    ";
  }

  // Método abstrato
  abstract function atacar(int $vidaInimigo): float;
}
