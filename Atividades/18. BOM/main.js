import * as fn from "./utils.js";
import { DadosUsuario } from "./DadosUsuario.js";

const dialog = document.querySelector("#modalFormulario")
const form = document.querySelector("#formulario");
const btnAbrirModal = document.getElementById("btnAbrirModal");
const btnFecharModal = document.querySelectorAll(".btnFecharModal");
const dadosEnviados = document.querySelector(".dados-enviados");

fn.abrirDialogClique(dialog, btnAbrirModal);
fn.fecharDialogClique(dialog, btnFecharModal);
fn.mostrarFaixaValor();

let dados;

form.addEventListener("submit", function (e) {
  e.preventDefault();
  const objFormDados = fn.extrairDadosFormulario(form);
  dados = new DadosUsuario(objFormDados);
  fn.mostrarDados(dados.imprimirDados(), dadosEnviados, dialog);
});

dialog.addEventListener("click", function(e){
  if (e.target === dialog) {fn.fecharDialog(dialog)};
})
