export class Aluno{

    // atributos
    nome;
    #matricula;
    #email;

    // construtor
    constructor(nome, matricula, email){
        this.nome = nome;
        this.#matricula = matricula;
        this.#email = email.toLowerCase();
    }

    // Getters
    get getNome(){
        return this.nome;
    }

    get getMatricula(){
        return this.#matricula;
    }

    get getEmail(){
        return this.#email;
    }

    // Setters
    set setNome(nome){
        this.nome = nome;
    }

    set setMatricula(matricula){
        this.#matricula = matricula;
    }

    set setEmail(email){
        this.#email = email.toLowerCase();
    }

    // metodos
    imprimirDados(){
        return `Nome: ${this.nome} \nMatricula: ${this.#matricula} \nEmail: ${this.#email}`;
    }

}