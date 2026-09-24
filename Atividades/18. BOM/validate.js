export function validarFormulario(form) {
  function msgErro(input, tipoErro) {
    input.classList.toggle("msgErro");
  }

  let inputUsuario = form.querySelector("#usuario");
  function validarNomeUsuario(inputUsuario) {
    if (input.value === "") {
      msgErro(inputUsuario);
    }
  }

  console.log(form);
  console.log(inputUsuario);
}
