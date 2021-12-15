const peliculas = ["La Guerra de las Galaxias La Amenaza Fantasma",
    "La Guerra de las Galaxias El Ataque de los Clones",
    "La Guerra de las Galaxias Una Nueva Esperanza",
    "La Guerra de las Galaxias El Imperio Contraataca",
    "La Guerra de las Galaxias El Retorno del Jedi",
    "Alien El Octavo Pasajero",
    "Aliens El Regreso",
    "Gangs of New York",
    "Alien 4 Resurreccion",
    "Pulp Fiction",
    "Deep Blue Sea",
    "El Señor de los Anillos Las Dos Torres",
    "El Señor de los Anillos El Retorno Del Rey",
    "Alguien Volo Sobre el Nido del Cuco",
    "El Señor de los Anillos La Comunidad del Anillo",
    "Los Vengadores",
    "Austin Powers",
    "Todo Sobre mi Madre",
    "Hable con Ella",
    "Cadena de Favores"
];

class Palabras {
    // variable que contiene la palabra o frase a encontrar
    palabraSeleccionada="";

    /**
     * funcion que devuelve un elemento aleatorio
     * @param {string} ar array de palabras
     */
    buscarPalabra(ar) {
        this.palabraSeleccionada=ar[Math.floor(Math.random() * ar.length)];
    }

    /**
     * Funcion para determinar si la palabra ha sido encontrada
     * 
     * @return {boolean} - devuelve true si la palabra ha sido encontrada
     */
    palabraEncontrada() {
        return !Array.from(document.querySelectorAll("#letrasBuscar>span")).some(el => el.innerText==="_");
   }

    /**
     * Funcion para mostrar la palabra o frase con subguiones
     * en el id indicado
     * @param {string} element elemento donde poner la palabra o frase
     * @param {array} listadoLetras listado de las letras a mostrar
     */
    mostrarPalabraEnWeb(idPalabras, listadoLetras) {
        idPalabras.innerHTML="";
        this.palabraSeleccionada.split('').map(el => {
            let caracter="<span class='space'></span>";
            if (el!==" ") {
                caracter=listadoLetras.indexOf(el.toLowerCase())==-1 ? "<span>_</span>" : "<span class='ok'>"+el+"</span>";
            }
            idPalabras.insertAdjacentHTML("beforeend", caracter);
        });
    }

    /**
     * Función para buscar en la palabra la letra recibida
     * Si se encuentra, se añade la clase "ok"
     *  
     * @param {string} letra
     * @return {boolean} true si existe la letra en la palabra
     */
    letraEnPalabra(letra) {
        return this.palabraSeleccionada.toLowerCase().indexOf(letra.toLowerCase())>-1;
    }
}

