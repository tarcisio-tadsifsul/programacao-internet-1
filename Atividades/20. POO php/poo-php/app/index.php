<?php

use App\Models\Guerreiro;
use App\Models\Mago;

require_once __DIR__ . '/Models/Guerreiro.php';
require_once __DIR__ . '/Models/Mago.php';

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
echo $mago->mostrarPersonagem();

$vidaInimigo = 200;
echo "Um inimigo apareceu com {$vidaInimigo} de vida!<br>";

echo "<br>";
$vidaInimigo = $heroi->atacar($vidaInimigo);
echo "{$heroi->getNome()} atacou!<br>";
echo "A vida do Inimigo caiu para: {$vidaInimigo}<br>";

echo "<br>";
$vidaInimigo = $mago->atacar($vidaInimigo);
echo "{$mago->getNome()} atacou!<br>";
echo "A vida do Inimigo caiu para: {$vidaInimigo}<br>";

echo "<br>";
$vidaInimigo = $heroi->atacar($vidaInimigo);
echo "{$heroi->getNome()} atacou novamente!<br>";
echo "A vida do Inimigo agora é: {$vidaInimigo}";
