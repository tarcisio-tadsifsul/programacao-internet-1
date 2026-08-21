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
    if (!novoTitulo) {
      this.#titulo = "Sem Titulo";
    } else {
      this.#titulo = novoTitulo;
    }
  }

  set preco(novoPreco) {
    if (novoPreco < 0) {
      console.log("Preco deve ser maior que 0!");
      this.#preco <= 0 ? this.#preco = 0 : null;
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
