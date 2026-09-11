export class DadosUsuario {
    // Atributos
    #nomeUsuario;
    #senha;
    #cpf;
    #urlMidiaSocial;
    #perfil;
    #categoriaProfissioanl;
    #dataNascimento;
    #valorA;
    #faixaValor;
    #canalContato;
    #aceiteTermos;
    
    // Construtor
    constructor(
        nomeUsuario
    ){
        this.#nomeUsuario = nomeUsuario;
    }

    // Metodo
    imprimirDados(){
        return `${this.#nomeUsuario}`;
    }
}