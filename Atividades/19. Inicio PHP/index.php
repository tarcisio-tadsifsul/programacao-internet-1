<?php

/**
 * 
 * 1) Crie um script capaz de identificar se uma determinada pessoa pode ou não doar sangue.
 * Utilize as variáveis $idade e $peso no processo.
 * Neste primeiro momento faça a atribuição de valores às variáveis de forma estática, ou seja, no processo de atribuição.
 * Se a idade estiver entre (e inclusive) 16 e 59 anos e o peso for igual ou superior a 50kg, então o sistema deve imprimir a mensagem “Atende aos requisitos”,
 * caso contrário o sistema deve imprimir a mensagem “Não atende aos requisitos”.
 * 
 * 
 * 2) Crie um array “pessoas” com 7 nomes, faça a impressão do array na página com a função print_rovo, usando a tag de formatação para organizar o resultado e depois utilizando o ForEach. 
 * 
 * 3) Crie uma página para chamar um arquivo externo que contenha funções com as operações matemáticas básicas de uma calculadora e um método de imprimir. O método de imprimir desse arquivo deve receber por parâmetro o que deve ser impresso ao usuário. Na página principal, faça chamada de cada um desses métodos e utilize a função imprimir para mostrar o resultado na tela.
 * 
 * 4) Crie um arquivo externo para incluir na página principal, onde uma função deve receber um array de notas de um aluno. Em seguida, retornar: a maior nota, a menor nota, e a média desse aluno. Exiba o resultado na página.
 * 
 *  5) Em um arquivo PHP externo, escreva uma função que receba um número como argumento e retorne se o número é par ou ímpar. (Defina os valores de forma estática) 
 * 
 * 6) Em um arquivo PHP externo, crie uma função que converte graus Celsius em Fahrenheit. (Defina os valores de forma estática).
 * 
 * 7) Em um arquivo PHP externo, crie uma função que imprima uma lista não ordenada, onde a quantidade de itens() é determinada pelo valor passado como argumento.(Defina o valor de forma estática) Inclua e chame essa função no arquivo principal do seu projeto. 
 * 
 * 8)Em um arquivo PHP externo, crie uma função que imprima um parágrafo, onde a cor do plano de fundo do parágrafo é determinada pela string que representa a cor passada como argumento. (Defina o valor de forma estática.) Inclua e chame essa função no arquivo principal do seu projeto.
 * 
 * */

/**
 * 1) Crie um script capaz de identificar se uma determinada pessoa pode ou não doar sangue.
 *    Utilize as variáveis $idade e $peso no processo.
 *    Neste primeiro momento faça a atribuição de valores às variáveis de forma estática, ou seja, no processo de atribuição.
 *    Se a idade estiver entre (e inclusive) 16 e 59 anos e o peso for igual ou superior a 50kg,
 *    então o sistema deve imprimir a mensagem “Atende aos requisitos”,
 *    caso contrário o sistema deve imprimir a mensagem “Não atende aos requisitos”.
 */

$idade = 18;
$peso = 49;

echo '<h2>Verificar Doador</h2>';
echo '<p>Idade: ' . $idade . 'anos </br> Peso: ' . $peso . 'kg</p>';

function verificarDoador($idade, $peso)
{
    if ($idade < 16 || $idade > 59 || $peso < 50) {
        return '❌ Não atende aos requisitos';
    }

    return '✅ Atende aos requisitos';
}

echo verificarDoador($idade, $peso);

echo ('</br></br><hr></br>');

/**
 * 2) Crie um array “pessoas” com 7 nomes, faça a impressão do array na página com a função print_rovo,
 *    usando a tag de formatação para organizar o resultado e depois utilizando o ForEach. 
 */

$pessoas = ['Maria', 'João', 'Carla', 'Marcos', 'Laura', 'Caio', 'Cris'];
print_r($pessoas);
echo ('</br></br>');
var_dump($pessoas);

echo ('</br></br>');
echo ('<h2>Lista de Nome</h2>');
echo ('<ul>');
foreach ($pessoas as $p) {
    echo ("<li>$p</li>");
    // echo('<li>' . $p .'</li>');
}
echo ('</ul>');

echo ('</br></br><hr></br>');

/**
 * 3) Crie uma página para chamar um arquivo externo
 *    que contenha funções com as operações matemáticas básicas
 *    de uma calculadora e um método de imprimir.
 *    O método de imprimir desse arquivo deve receber por parâmetro
 *    o que deve ser impresso ao usuário.
 *    Na página principal, faça chamada de cada um desses métodos
 *    e utilize a função imprimir para mostrar o resultado na tela.
 * 
 */

echo ('<h2>Operações Matemáticas Básicas</h2>');

include 'fnMath.php';

$resultado = somar(2, 3);
echo (imprimir($resultado));

$resultado = subtrair(28, 17);
echo (imprimir($resultado));

$resultado = dividir(13, 8);
echo (imprimir($resultado));

$resultado = multiplicar(8, 9);
echo (imprimir($resultado));

$resultado = imprimirComOperacao('div', 8, 4);
echo ($resultado);

echo ('</br></br><hr></br>');

/**
 * 4) Crie um arquivo externo para incluir na página principal,
 *    onde uma função deve receber um array de notas de um aluno.
 *    Em seguida, retornar: a maior nota, a menor nota, e a média.
 *    Exiba o resultado na página.
 * 
 */

 echo ('<h2>Média Notas</h2>');
 
include 'fnNotas.php';

$arrNotas = [7.9, 8.6, 7.3];

echo(imprimirNotas($arrNotas));
echo('<p>Menor Nota: ' . menorNota($arrNotas) . '</p>');
echo('<p>Maior Nota: ' . maiorNota($arrNotas) . '</p>');
echo('<p>Média: ' . mediaNotas($arrNotas) . '</p>');