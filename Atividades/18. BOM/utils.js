// Função que controla abertura e fechamento do modal Dialog
export function abrirDialogClique(dialogModal, btnAbrir) {
  btnAbrir.addEventListener("click", function () {
    if (!dialogModal.open) {
      dialogModal.showModal();
    } else {
      alert("O formulario já está aberto!");
      console.log("O formulario já está aberto!");
    }
  });
}

export function fecharDialogClique(dialogModal, btnFechar) {
  btnFechar.forEach(function (btn) {
    btn.addEventListener("click", function () {
      dialogModal.close();
    });
  });
}

export function fecharDialog(dialogModal) {
  dialogModal.close();
}

// Função para mostrar o valor do range
export function mostrarFaixaValor() {
  let faixaValor = document.querySelector("#faixa-valor");
  let valor = document.querySelector("#valor");

  valor.textContent = faixaValor.value;

  faixaValor.addEventListener("input", function (event) {
    valor.textContent = event.target.value;
  });
}

// Função que receber dados e cria objeto
export function extrairDadosFormulario(form) {
  const formDados = new FormData(form);
  return Object.fromEntries(formDados);
}

// Função para mostrar div com dados
export function mostrarDados(dados, dadosEnviados, dialog) {
  fecharDialog(dialog);
  
  dadosEnviados.querySelector(".infos").innerHTML = dados;
  dadosEnviados.classList.remove("oculto");

  console.log(dados);
}
