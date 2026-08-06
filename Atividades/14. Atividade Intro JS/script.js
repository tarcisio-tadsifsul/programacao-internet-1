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
//     console.log(arrNome)    
// }

// arrNome.forEach(nome => {
//     alert(nome);
// })