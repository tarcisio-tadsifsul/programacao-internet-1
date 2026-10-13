<?php

use App\Models\Guerreiro;
use App\Models\Mago;

require_once __DIR__ . '/Models/Guerreiro.php';

$heroi = new Guerreiro(
    nome: 'Guerreiro Z',
    vida: 100,
    nivel: 1,
    forcaFisica: 30
);

$mago = new Mago(
    nome: 'Mister M',
    vida: 100,
    nivel: 1,
    forcaMagica: 20
);

echo $heroi->mostrarPersonagem();

$vidaInimigo = 200;

echo "<br><br>";
echo "Um inimigo apareceu com {$vidaInimigo} de vida!<br>";

$vidaInimigo = $heroi->atacar($vidaInimigo);
$vidaInimigo = $mago->atacar($vidaInimigo);

echo "<br>";
echo "{$heroi->getNome()} atacou!<br>";
echo "A vida do Inimigo caiu para: {$vidaInimigo}<br>";

echo "<br>";
$vidaInimigo = $heroi->atacar($vidaInimigo);
echo "{$heroi->getNome()} atacou novamente!<br>";
echo "A vida do Inimigo agora é: {$vidaInimigo}";
