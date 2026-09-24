export function validarFormulario(form) {
  function msgErro(input) {
    input.classList.toggle("msg-erro");
  }

  let inputUsuario = form.querySelector("#usuario");
  function validarNomeUsuario(input) {
    if (input.value === "") {
      msgErro(input);
    }
  }
  
  validarNomeUsuario(inputUsuario);
  
  // console.log(inputUsuario);
  // console.log(form);
}
