export function abrirFecharDialog(){
    const dialog = document.getElementById('modalFormulario');
    const abrirModal = document.getElementById('abrirModal');
    const fecharModal = document.querySelectorAll('.fecharModal');

    abrirModal.addEventListener('click', function(){
        if (!dialog.open) {
            dialog.showModal();            
        } else {
            alert("O formulario já está aberto!")
            console.log("O formulario já está aberto!")
        }
        
    });

    fecharModal.forEach(function(btn){
        btn.addEventListener('click', function(){
            dialog.close();
        });
    })
}

export function mostraFaixaValor() {
    let faixaValor = document.querySelector("#faixa-valor")
    let valor = document.querySelector("#valor")

    valor.textContent = faixaValor.value;
    
    faixaValor.addEventListener("input", function(event){
        valor.textContent = event.target.value;
    })
}

