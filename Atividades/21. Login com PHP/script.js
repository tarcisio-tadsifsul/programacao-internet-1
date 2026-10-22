const form = document.querySelector("#formulario");
// console.log(form);

function capturarCampos(form) {
  inputs = form.querySelectorAll("input");

  let formValido = true;
  let campoPreenchido = false;
  let campoValido = true;

  inputs.forEach((input) => {
    campoPreenchido = verificaCampoVazio(input);

    if (campoPreenchido) {
      if (input.id === "user-email") {
        campoValido = validaCampoEmail(input);
      }
      if (input.id === "senha") {
        campoValido = validaCampoSenha(input);
      }
    }
  });

  if (!campoPreenchido || !campoValido) {
    formValido = false;
  }
  return formValido;
}

function verificaCampoVazio(input) {
  if (input.value === "") {
    input.classList.add("invalido", "vazio");
    return false;
  } else {
    input.classList.remove("invalido", "vazio");
    return true;
  }
}

function validaCampoEmail(input) {
  const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  if (!regexEmail.test(input.value)) {
    // console.log("email: ", regexEmail.test(input.value));
    input.classList.add("invalido", "email-invalido");
    input.classList.remove("validado");
    return false;
  } else {
    // console.log("email: ", regexEmail.test(input.value));
    input.classList.remove("invalido", "email-invalido");
    input.classList.add("validado");
    return true;
  }
}

function validaCampoSenha(input) {
  if (input.value.length < 5) {
    input.classList.add("invalido", "senha-invalida");
    input.classList.remove("validado");
    return false;
  } else {
    input.classList.remove("invalido", "senha-invalida");
    input.classList.add("validado");
    return true;
  }
}

function inicializarValidacaoForm(form) {
  if (!form) {
    console.log("form não capturado!");
    return;
  }

  form.addEventListener("submit", (event) => {
    event.preventDefault();
    console.log("submit capturado!");

    const valido = capturarCampos(form);

    if (valido) {
      console.log("Formulário validado com sucesso! Enviando dados...");
      form.submit();
    } else {
      console.log("Formulário contem erros! Envio cancelado!");
    }
  });
}

inicializarValidacaoForm(form);
