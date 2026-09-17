import * as fn from "./utils.js";
import { DadosUsuario } from "./DadosUsuario.js";

fn.abrirDialogClique();
fn.fecharDialogClique();
fn.mostrarFaixaValor();

const form = document.querySelector("#formulario");
let dados;

form.addEventListener("submit", function (e) {
  e.preventDefault();

  const objFormDados = fn.extrairDadosFormulario(form);

  dados = new DadosUsuario(objFormDados);

  fn.mostrarDados(dados.imprimirDados());
});
