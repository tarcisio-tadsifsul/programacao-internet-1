import { Aluno } from "./aluno.js";

export class Bolsista extends Aluno{

    // atributos
    #valorBolsa;

    // Construtor
    constructor(nome, matricula, email, valorBolsa){
        super(nome, matricula, email);
        this.#valorBolsa = valorBolsa;
    }

    // Getters
    get valorBolsa(){
        return this.#valorBolsa;
    }

    // Setters
    set valorBolsa(valorBolsa){
        this.#valorBolsa = valorBolsa;
    }

    // metodo
    imprimirDados(){
        return `${super.imprimirDados()} \nValor Bolsa: R$ ${this.#valorBolsa}`;
    }

}