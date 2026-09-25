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
 * */

    $idade = 18;
    $peso = 89;

    echo '<h2>Verificar Doador:</h2>';
    echo '<p>Idade: ' . $idade . 'anos</p>';
    echo '<p>Peso: ' . $peso . 'kg</p>';

    function verificarDoador($idade, $peso){
        if ($idade < 16 || $idade > 59 || $peso < 50) {
            return '❌ Não atende aos requisitos';
        } 

        return '✅ Não atende aos requisitos';
    }

    echo verificarDoador($idade, $peso);


?>
