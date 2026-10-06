<?php

use App\Models\Personagem;

class Guerreiro extends Personagem
{

  public function __construct(
    string $nome,
    int $vida,
    int $mana,
    int $nivel,
    private int $forcaFisica,
  ) {
    return parent::__construct($nome, $vida, $mana, $nivel);
  }

  /**
   * Método atacar
   */
  public function atacar(int $vidaInimigo): int
  {
    $danoFinal = $this->forcaFisica * $this->nivel;
    $this->forcaFisica = $this->forcaFisica * 0.2;
    return $danoFinal - $vidaInimigo;
  }
}
