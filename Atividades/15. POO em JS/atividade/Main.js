import { Produto } from "./Produto.js";
import { Livro } from "./Livro.js";

let produto = new Produto("Produto XYZ", 49.9, 30);
console.log(produto.exibirDados());

let livro = new Livro(
  "Livro XYZ",
  49.9,
  30,
  "Fulano de TI",
  900,
  "Editora Programes",
);
console.log(typeof livro, livro.exibirDados());

produto.preco = -100

console.log(produto.exibirDados());

function* geradorDeId() {
  let id = 1;
  while(true) {
    yield id++; // Pausa a função aqui e entrega o valor
  }
}

const criarId = geradorDeId();
console.log(criarId.next().value); // 1
console.log(criarId.next().value); // 2 (a função continuou de onde parou!)