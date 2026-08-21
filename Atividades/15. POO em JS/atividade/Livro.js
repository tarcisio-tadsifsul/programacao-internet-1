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
    // Sem # para que this.autor invoque o setter!
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
    if (novoNumeroPaginas > 0) this.#numeroPaginas = novoNumeroPaginas;
  }
  set editora(novaEditora) {
    this.#editora = novaEditora;
  }

  // Metodos
  exibirDados() {
    return `${super.exibirDados()}\nAutor: ${this.autor}\nNumero Paginas: ${this.numeroPaginas}\nEditora: ${this.editora}`;
  }
}
