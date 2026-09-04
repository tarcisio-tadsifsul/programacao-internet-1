/**
 * Muda cor do background
 * @param nomeCor 
 */

function alterarPageColor(nomeCor){
    document.body.style.backgroundColor = `${nomeCor}`;
}

function selecionarBotao(){
    let btns = document.querySelectorAll("#altera-bg .btn");
    let nomeCor;
    btns.forEach(function(btn){
        btn.addEventListener("click", function(event){
            nomeCor = event.target.classList[1];
            alterarPageColor(nomeCor);
        })
    })

}

selecionarBotao();

/**
 * Contador
 * 
 */
function contador(){
    let btnMenos = document.getElementById("menos");
    let inputMostraNumero = document.getElementById("mostra-numero");
    let btnMais = document.getElementById("mais");

    inputMostraNumero.value = 0;
    let valorCampo = 0;

    [btnMenos, btnMais].forEach(function(btn){
        btn.addEventListener("click", function(event){
            
            if (event.target.id === "mais") {
                inputMostraNumero.value = ++valorCampo;
            } else {
                inputMostraNumero.value = --valorCampo;
            }

            if (valorCampo > 5) {                
                inputMostraNumero.style.color = "red";
                inputMostraNumero.style.fontWeight = 600;
            } else {
                inputMostraNumero.style.color = "black";
                inputMostraNumero.style.fontWeight = 400;
            }
        })        
    });
}

contador();

/**
 * Visibilidade do texto
 */

function visibilidadeTexto(){
    let texto = document.getElementById("texto");
    let btnEsconder = document.getElementById("esconder");
    let btnMostrar = document.getElementById("mostrar");

    let textoParagrafo = texto.innerHTML;
    
    [btnEsconder, btnMostrar].forEach(function(btns) {
        btns.addEventListener("click", function(event){
            event.target.id === "esconder" ?
            texto.innerHTML = "..." :
            texto.innerHTML = textoParagrafo;
        })
    })


}

visibilidadeTexto();

/**
 * Tecla pressionada no campo
 */

function teclaPressionada(e){
    console.log(e.key)
    alert(`Você pressionou uma tecla ${e.key}`);
}

/**
 * Escrever input na tela
 */

function escreveTextoDigitado() {
    let inputTexto = document.getElementById('caixa-texto');
    let paragrafo = document.getElementById('paragrafo');
    let textoDigitado = "";
    let posicaoCursor = 0;

    inputTexto.addEventListener("keydown", function(e){
        posicaoCursor = inputTexto.selectionEnd;
        if (e.key.length > 1) {
            if (e.key === "Backspace") {
                textoDigitado = textoDigitado.replace(
                    (textoDigitado.charAt(posicaoCursor - 1))
                    ,"");
                //"string".replace("string".charAt("string".length - 1),"")
            }
        } else {
            textoDigitado += e.key;
        }

        paragrafo.innerHTML = textoDigitado;

    })
}

escreveTextoDigitado()