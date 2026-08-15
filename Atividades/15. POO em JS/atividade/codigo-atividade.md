# Código da Atividade POO com JS

## index.html

```HTML
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Atividade Introdução à JS</title>
    <script type="module" src="./Main.js" defer></script>
  </head>
  <body></body>
</html>
```

## Classe Main

```JavaScript
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
console.log(livro.exibirDados());
```

## Classe Produto

```JavaScript
export class Produto {
  // Atributos
  #titulo;
  #preco;
  #estoque;

  // Construtor
  constructor(titulo, preco, estoque) {
    this.titulo = titulo; // Sem # para que this.titulo invoque o setter!
    this.preco = preco;
    this.estoque = estoque;
  }

  // Getters
  get titulo() {
    return this.#titulo;
  }
  get preco() {
    return this.#preco;
  }
  get estoque() {
    return this.#estoque;
  }

  // Setters
  set titulo(novoTitulo) {
    if (novoTitulo.length <= 0 || novoTitulo === "") {
      this.#titulo = "Sem Titulo";
    } else {
      this.#titulo = novoTitulo;
    }
  }
  set preco(novoPreco) {
    if (novoPreco < 0) {
      console.log("Preco deve ser maior que 0!");
      this.#preco = 0;
    } else {
      this.#preco = novoPreco;
    }
  }
  set estoque(novoEstoque) {
    if (novoEstoque < 0) {
      console.log("Estoque deve ser maior que 0!");
      this.#estoque = 0;
    } else {
      this.#estoque = novoEstoque;
    }
  }

  // Metodos
  exibirDados() {
    return `Titulo: ${this.titulo}\nPreco: R$ ${this.preco}\nEstoque: ${this.estoque} UND`;
  }
}
```

## Classe Livro

```JavaScript
import { Produto } from "./Produto.js";

export class Livro extends Produto {
  // Atributos
  #autor;
  #numeroPaginas;
  #editora;

  // Construtor;
  constructor(titulo, preco, estoque, autor, numeroPaginas, editora) {
    // Atributos da classe pai
    super(titulo, preco, estoque);
    // Sem # para que this.titulo invoque o setter!
    this.autor = autor;
    this.numeroPaginas = numeroPaginas;
    this.editora = editora;
  }

  // Getters
  get autor() {
    return this.#autor;
  }
  get numeroPaginas() {
    return this.#numeroPaginas;
  }
  get editora() {
    return this.#editora;
  }

  // Setters
  set autor(novoAutor) {
    this.#autor = novoAutor;
  }
  set numeroPaginas(novoNumeroPaginas) {
    this.#numeroPaginas = novoNumeroPaginas;
  }
  set editora(novaEditora) {
    this.#editora = novaEditora;
  }

  // Metodos
  exibirDados() {
    return `${super.exibirDados()}\nAutor: ${this.autor}\nNumero Paginas: ${this.numeroPaginas}\nEditora: ${this.editora}`;
  }
}
```
