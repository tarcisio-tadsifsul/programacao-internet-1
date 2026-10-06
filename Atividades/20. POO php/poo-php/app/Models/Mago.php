<?php

use App\Models\Personagem;

class Mago extends Personagem
{

  public function __construct(
    string $nome,
    int $vida,
    int $mana,
    int $nivel,
    private int $forcaMagica
  ) {
    return parent::__construct($nome, $vida, $mana, $nivel);
  }

  /**
   * Método atacar
   */
  public function atacar(int $vidaInimigo): int
  {
    $danoFinal = $this->forcaMagica - $vidaInimigo;
    $this->forcaMagica = $this->forcaMagica * 0.25;
    return $danoFinal;
  }
}
