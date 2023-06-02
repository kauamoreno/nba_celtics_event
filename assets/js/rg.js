/*********************** MASCARA RG ***********************/
function formatarRG(rg) {
    let rgTamanho = rg.value.length
    let codigoTecla = event.keyCode;

    // Verifica se a tecla pressionada é um número (0-9)
    if (codigoTecla >= 48 && codigoTecla <= 57) {
        if (rgTamanho === 2 || rgTamanho === 6) {
            rg.value += '.'
        } else if (rgTamanho === 10) {
            rg.value += '-'
        }
    } else {
        event.preventDefault(); // Impede o comportamento padrao
    }
}

const rg = document.querySelector('#rg')
rg.addEventListener('keypress', () => {
    formatarRG(rg);
});