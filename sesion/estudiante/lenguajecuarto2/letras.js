class Letras extends Palabras {
    // array que contiene las letras que ha introducido el usuario
    letrasSeleccionadas=[];
    fallos=0;

    /**
     * Metodo para añadir la letra seleccionada por el usuario
     * 
     * @param {string} letra 
     * @returns {boolean} 
     */
    entradaLetra(letra) {
        this.letra = letra;
        return this.letra;
    }

    get letra() {
        return this._letra;
    }
    set letra(value) {
        if (value.length==1 && value.match(/[0-9a-zñç]/i) && this.letrasSeleccionadas.indexOf(value.toLowerCase())==-1) {
            this._letra=value.toLowerCase();
            this.letrasSeleccionadas.push(this._letra);
            if (this.letraEnPalabra(this._letra)) {
                document.getElementById("letrasBuscadas").insertAdjacentHTML("beforeend", "<span class='ok'>"+this._letra+"</span>");
            } else {
                this.showImage(++this.fallos);
                document.getElementById("letrasBuscadas").insertAdjacentHTML("beforeend", "<span>"+this._letra+"</span>");
            }
        }
        return;
    }

    /**
     * Funcion para mostrar la imagen del ahorcado
     * 
     * @param {integer} number 
     */
    showImage(number) {
        document.getElementById("imagen").src="img/"+number+".png";
        if (number==10) {
            eliminarEvento();
            // mostramos el error
            document.getElementById("resultado").innerHTML="<div class='fail'>"+this.palabraSeleccionada+"</div>";
        }
    }
}
