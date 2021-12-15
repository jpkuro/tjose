window.addEventListener("keyup", teclaPulsada);

function eliminarEvento() {
    // deshabilitamos el evento keyup
    window.removeEventListener("keyup", teclaPulsada);
}

// función que recibe la pulsación de la tecla
function teclaPulsada(e) {
    const tecla=this.innerText || e.key;
    if (letras.entradaLetra(tecla)) {
        letras.mostrarPalabraEnWeb(document.getElementById("letrasBuscar"), letras.letrasSeleccionadas);
        if (letras.palabraEncontrada()) {
            eliminarEvento();
            document.getElementById("resultado").innerHTML="<div class='ok'>Lo has conseguido en "+document.querySelectorAll("#letrasBuscadas>span").length+" intentos, y has realizado "+letras.fallos+" fallos.</div>";
        }

    }
}
