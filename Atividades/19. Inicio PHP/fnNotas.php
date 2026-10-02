<?php

function imprimirNotas($arrNotas){
    $strgNotas = '';    
    foreach ($arrNotas as $key => $nota) {
        $strgNotas .= '</p>Nota #0' . $key + 1 .' = ' . $nota . '</p>';
    }
    return $strgNotas;
}

function maiorNota($arrNotas){
    $maiorNota = 0;
    foreach ($arrNotas as $nota) {
        $maiorNota = $nota > $maiorNota ? $nota : $maiorNota;
    }
    return $maiorNota;
}

function menorNota($arrNotas){
    $menorNota = 10;
    foreach ($arrNotas as $nota) {
        $menorNota = $nota < $menorNota ? $nota : $menorNota;
    }
    return $menorNota;
}

function mediaNotas($arrNotas) {
    $somaNotas = 0;
    $i = 0;
    foreach ($arrNotas as $nota) {
        $somaNotas += $nota;
        $i++;
    }
    $media = $somaNotas / $i;
    return round($media, 2);
}