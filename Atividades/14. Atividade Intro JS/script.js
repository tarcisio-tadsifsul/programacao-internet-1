/**
 * Escreva um algoritmo que receba a média de aproveitamento de um aluno (em números)
 * após converta a nota numérica para conceito seguindo a tabela abaixo:
 * 
 * Média        Conceito
 * >= 9,0           A
 * >= 7,5 & < 9,0   B
 * >= 6,0 & < 7,5   C
 * < 6,0            D
 * 
 */

// let media = prompt("Média: ");
// console.log(typeof media)
// //let media = parseFloat(prompt("Média: "));
// if (media.includes(",")){
//     media = media.replace(',','.');
// }
// media = parseFloat(media);
// console.log(typeof media);

// if (media >= 9 && media <= 10){
//     window.alert(`Conceito A`);
// } else if(media >= 7.5 && media < 9){
//     window.alert(`Conceito B`);
// } else if(media >= 6 && media < 7.5){
//     window.alert(`Conceito C`);
// } else {
//     window.alert(`Conceito D`);
// }


/**
 * 11. Peça um número inteiro positivo N ao usuário.
 * Usando um laço while, calcule e exiba a soma de todos os inteiros de 1 até N  
 */

// let contador = 0;
// let numero = prompt("Digite um número: ");
// let soma = 0;
// console.log(`Número informado: ${numero}`);

// while (contador <= numero) {
//     soma += contador;
//     contador++;
// }

// console.log(`A soma de 1 até ${numero} = ${soma}`);
// window.alert(`A soma de 1 até ${numero} = ${soma}`);

/**
 * 13. Crie um array contendo 5 números inteiros definidos no código.
 *     Calcule e mostre no console do navegador: o menor número, o maior número,
 *     a média da coleção.
 */

// let arrNumero = [5,13,-17,24,39];
// let menorNum=arrNumero[0];
// let maiorNum=0;
// let soma=0;
// let media=0;

// for (let i = 0; i < arrNumero.length; i++) {

//     if (arrNumero[i] < menorNum){
//         menorNum = arrNumero[i]
//     }
//     if (arrNumero[i] > maiorNum){
//         maiorNum = arrNumero[i]
//     }
//     soma += arrNumero[i];
// }

// media = soma / arrNumero.length;

// console.log(`
//     Coleção: [${arrNumero}]
//     Menor numero: ${menorNum}
//     Maior Numero: ${maiorNum}
//     Soma: ${soma}
//     Qtd Itens: ${arrNumero.length   }
//     Média: ${media}
// `)


/**
 * 14. Crie um array com 5 frutas e mostre todas elas com um laço for.
 */

// let frutas = ["maça", "banana", "laranja", "uva", "goiaba"]

// for (let i = 0; i < frutas.length; i++) {
//     console.table(`${frutas[i]}`)
// }


/**
 * 15. Permita ao usuário adicionar nomes a um array usando prompt() (3 vezes).
 *     Exiba os nomes com forEach(). Utilize os métodos de adição do objeto vetor.
*/

// let arrNome = new Array();
// for (let i = 0; i < 3; i++) {
//     arrNome.push(prompt("Digite um nome"));
//     console.log(arrNome);   
// }

// arrNome.forEach(nome => {
//     window.alert(nome);
// })
