export class DadosUsuario {
  // Atributos
  #usuario;
  #telefone;
  #senha;
  #perfil;
  #categoriaProfissional;
  #dataNascimento;
  #faixaValor;
  #canalContato;
  #mensagem;
  #aceiteTermos;

  // Construtor
  constructor(objFormDados) {
    this.#usuario = objFormDados.usuario;
    this.#telefone = objFormDados.telefone;
    this.#senha = objFormDados.senha;
    this.#perfil = objFormDados.perfil;
    this.#categoriaProfissional = objFormDados["categoria-profissional"];
    this.#dataNascimento = objFormDados["data-nascimento"];
    this.#faixaValor = objFormDados["faixa-valor"];
    this.#canalContato = objFormDados["canal-contato"];
    this.#mensagem = objFormDados.mensagem;
    this.#aceiteTermos = objFormDados.aceite;
  }

  // Metodo
  formatarMoeda() {
    let valorFormatado = parseFloat(this.#faixaValor).toLocaleString("pt-BR", {
      style: "currency",
      currency: "BRL",
    });
    return valorFormatado;
  }

  formatarDataNascimento() {
    const dataNasc = new Date(this.#dataNascimento);
    const dataFormtada = new Intl.DateTimeFormat("pt-BR").format(dataNasc);
    return dataFormtada;
    // return dataNasc.toLocaleString("pt-BR");
  }

  imprimirDados() {
    return `<span>Nome: ${this.#usuario || ""}</span>
    <span>Telefone: ${this.#telefone || ""}</span>
    <span>Senha: ${this.#senha || ""}</span>
    <span>Perfil Rede Social: ${this.#perfil || ""}</span>
    <span>Categoria Profissional: ${this.#categoriaProfissional || ""}</span>
    <span>Data Nascimento: ${this.formatarDataNascimento() || ""}</span>
    <span>Valor: ${this.formatarMoeda() || ""}</span>
    <span>Preferência de Contato: ${this.#canalContato || ""}</span>
    <span>Mensagem: ${this.#mensagem || ""}</span>
    <span>Termos e Condições: ${this.#aceiteTermos === "on" ? "Sim" : "Não"}</span>`;
  }
}
