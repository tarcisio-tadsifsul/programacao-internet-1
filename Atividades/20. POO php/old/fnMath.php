<?php

$res = 0;

function somar($n1, $n2){
    return $n1 + $n2;
}

function subtrair($n1, $n2){
    return $n1 - $n2;
}

function dividir($n1, $n2){
    return round($n1 / $n2, 2);
}

function multiplicar($n1, $n2){
    return $n1 * $n2;
}

function imprimir($res){
    return "<p>$res</p>";

}

function imprimirComOperacao($op, $n1, $n2){
    switch ($op) {
        case 'soma':
            $res = "Soma: $n1 + $n2 = " . somar($n1, $n2);
            break;
        case 'subtr':
            $res = "Subtr: $n1 - $n2 = " . substr($n1, $n2);
            break;
        case 'div':
            $res = "Dividir: $n1 / $n2 = " . dividir($n1, $n2);
            break;
        case 'multp':
            $res = "Multp: $n1 * $n2 = " . multiplicar($n1, $n2);
            break;
        
        default:
            $res = 'Nenhuma Operação Realizada!';
            break;
    }
    return $res;
}