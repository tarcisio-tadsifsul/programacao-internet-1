// Função que controla abertura e fechamento do modal Dialog
export function abrirDialogClique() {
  const dialog = document.getElementById("modalFormulario");
  const abrirModal = document.getElementById("abrirModal");

  abrirModal.addEventListener("click", function () {
    if (!dialog.open) {
      dialog.showModal();
    } else {
      alert("O formulario já está aberto!");
      console.log("O formulario já está aberto!");
    }
  });
}

export function fecharDialogClique() {
  const dialog = document.getElementById("modalFormulario");
  const fecharModal = document.querySelectorAll(".fecharModal");

  fecharModal.forEach(function (btn) {
    btn.addEventListener("click", function () {
      dialog.close();
    });
  });
}

export function fecharDialog() {
  const dialog = document.getElementById("modalFormulario");
  dialog.close();
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
export function mostrarDados(dados) {
  fecharDialog();
  const dadosEnviados = document.querySelector(".dados-enviados");
  dadosEnviados.querySelector(".infos").innerHTML = dados;
  dadosEnviados.classList.remove("oculto");

  console.log(dados);
}
