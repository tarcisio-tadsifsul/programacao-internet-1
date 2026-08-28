function alterarPageColor(nomeCor){
    document.body.style.backgroundColor = `${nomeCor}`;
}

function selecionarBotao(){
    let btns = document.querySelectorAll('.btn');
    let nomeCor;
    btns.forEach(function(btn){
        btn.addEventListener("click", function(event){
            nomeCor = event.target.classList[1];
            alterarPageColor(nomeCor);
        })
    })

}

selecionarBotao();