// import { Aluno } from "./aluno.js";
import { Bolsista } from "./bolsista.js";

// let objAluno = new Aluno("Pedro", "001MATR", "PEDRO@gmail.com");
let objAluno = new Bolsista("Pedro Ramos", "001MATR", "PEDRO@gmail.com", "10000");

console.log(objAluno.nome);
console.log(objAluno.getMatricula);
console.log(objAluno.getEmail);

console.table(objAluno.imprimirDados());

objAluno.setEmail = "Pedro.Ramos@gmail.com";
console.table(objAluno.imprimirDados());
