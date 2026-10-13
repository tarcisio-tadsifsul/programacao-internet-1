<?php

// Faz o PHP a respeitar os tipos exatos de dados (int, string, etc.)
declare(strict_types=1);

// Define onde esta classe "vive" no projeto
namespace App\Models;

require_once 'Personagem.php';

class Mago extends Personagem
{
  public function __construct(
    string $nome = '',
    int $vida = 0,
    int $nivel = 0,
    private float $forcaMagica = 0.0
  ) {
    parent::__construct($nome, $vida, $nivel);
  }

  public function mostrarPersonagem(): string
  {
    $infosBasicas = parent::mostrarPersonagem();
    return "
      {$infosBasicas}<br>
      Força Física: {$this->forcaMagica}
      <br><br>
    ";
  }

  /**
   * Método atacar
   */
  public function atacar(int $vidaInimigo): float
  {
    $danoFinal = $this->forcaMagica * $this->nivel;
    return $vidaInimigo - $danoFinal;
  }
}
