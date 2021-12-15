let datos = [
	{
		fruta: 'e',
		imagen: './frutas/e.svg',
		precio: 5,
		unidad: 'letra'
	},
	{
		fruta: 'a',
		imagen: './frutas/a.svg',
		precio: 1,
		unidad: 'letra'
	},

	{
		fruta: 'B',
		imagen: './frutas/B.svg',
		precio: 2,
		unidad: 'letra'
	},
	{
		fruta: 'C',
		imagen: './frutas/C.svg',
		precio: 3,
		unidad: 'LETRA'
	},
	{
		fruta: 'D',
		imagen: './frutas/D.svg',
		precio: 4,
		unidad: 'LETRA'
	},
	{
		fruta: 'F',
		imagen: './frutas/F.svg',
		precio: 6,
		unidad: 'LETRA'
	},
	{
		fruta: 'G',
		imagen: './frutas/G.svg',
		precio: 7,
		unidad: 'LETRA'
	},
	{
		fruta: 'H',
		imagen: './frutas/H.svg',
		precio: 8,
		unidad: 'LETRA'
	},
	{
		fruta: 'I',
		imagen: './frutas/I.svg',
		precio: 9,
		unidad: 'LETRA'
	},
	{
		fruta: 'J',
		imagen: './frutas/J.svg',
		precio: 10,
		unidad: 'LETRA'
	},
	{
		fruta: 'K',
		imagen: './frutas/K.svg',
		precio: 11,
		unidad: 'LETRA'
	},
	{
		fruta: 'M',
		imagen: './frutas/M.svg',
		precio: 13,
		unidad: 'LETRA'
	},
	{
		fruta: 'N',
		imagen: './frutas/N.svg',
		precio: 14,
		unidad: 'LETRA'
	},
	{
		fruta: 'NN',
		imagen: './frutas/NN.svg',
		precio: 15,
		unidad: 'LETRA'
	},
	{
		fruta: 'O',
		imagen: './frutas/O.svg',
		precio: 16,
		unidad: 'LETRA'
	},
	{
		fruta: 'P',
		imagen: './frutas/P.svg',
		precio: 17,
		unidad: 'LETRA'
	},
	{
		fruta: 'Q',
		imagen: './frutas/Q.svg',
		precio: 18,
		unidad: 'LETRA'
	},
	{
		fruta: 'R',
		imagen: './frutas/R.svg',
		precio: 19,
		unidad: 'LETRA'
	},
	{
		fruta: 'S',
		imagen: './frutas/S.svg',
		precio: 20,
		unidad: 'LETRA'
	},
	{
		fruta: 'T',
		imagen: './frutas/T.svg',
		precio: 21,
		unidad: 'LETRA'
	},
	{
		fruta: 'U',
		imagen: './frutas/U.svg',
		precio: 22,
		unidad: 'LETRA'
	},
		{
		fruta: 'V',
		imagen: './frutas/V.svg',
		precio: 23,
		unidad: 'LETRA'
	},
	{
		fruta: 'W',
		imagen: './frutas/W.svg',
		precio: 24,
		unidad: 'LETRA'
	},
	{
		fruta: 'X',
		imagen: './frutas/X.svg',
		precio: 25,
		unidad: 'LETRA'
	},
	{
		fruta: 'Y',
		imagen: './frutas/Y.svg',
		precio: 26,
		unidad: 'LETRA'
	},
	{
		fruta: 'Z',
		imagen: './frutas/Z.svg',
		precio: 27,
		unidad: 'LETRA'
	},
	{
		fruta: 'L',
		imagen: './frutas/L.svg',
		precio: 12,
		unidad: 'LETRA'
	}
];

let shuffleArray = shuffle(datos);

window.addEventListener('DOMContentLoaded', function (event){			
	document.getElementById('drag1').innerHTML = `<img id='drag1' class='fruta dropzone' src=${shuffleArray[1].imagen} alt='fruta' data-cualq=${shuffleArray[1].precio} onclick=cambio(1) draggable='true' ondragstart=drag(event) />`;
	document.getElementById('drag2').innerHTML = `<img id='drag2' class='fruta dropzone' src=${shuffleArray[5].imagen} alt='fruta' data-cualq=${shuffleArray[5].precio} onclick=cambio(5) draggable='true' ondragstart=drag(event) />`;
	document.getElementById('drag3').innerHTML = `<img id='drag3' class='fruta dropzone' src=${shuffleArray[8].imagen} alt='fruta' data-cualq=${shuffleArray[8].precio} onclick=cambio(8) draggable='true' ondragstart=drag(event) />`;
});


function shuffle(array){ 
  for (let indice1 = array.length - 1; indice1 > 0; indice1--) {       
	  let indice2 = Math.floor(Math.random() * (indice1 + 1));                    
	  let temp = array[indice1]; 
	  array[indice1] = array[indice2]; 
	  array[indice2] = temp;
  }        
  return array;
}

function cambio(num){			
	document.getElementById('info1').textContent = `${shuffleArray[num].precio}`;
	document.getElementById('info2').innerHTML = `<img src=${shuffleArray[num].imagen} alt=${shuffleArray[num].fruta} class='fruta'  />`;
	document.getElementById('info3').textContent = `${shuffleArray[num].fruta}`;
}

document.querySelector('#evalresultado').addEventListener('click', function(){
	let elem1 = document.querySelector('#caja1 img').dataset.cualq;
	let elem2 = document.querySelector('#caja2 img').dataset.cualq;
	let elem3 = document.querySelector('#caja3 img').dataset.cualq;
	let casobien = document.querySelector('#casobien');
	
	document.querySelector('#evalresultado').remove();

	return (elem2 - elem1 > 0 && elem3 - elem2 > 0) ? 
		casobien.innerHTML = `<div class='bien resultado'> <div class='feedback'>MUY BIEN! <br> Así se hace</div> <a href="../../../login/account.php?q=4"> <img src="./botones/enviar_verde.svg" alt='boton verde' class='boton' /> <a href=""> <img src="./botones/volverj.svg" alt='boton verde' class='boton' /></div></a>` 
	: casobien.innerHTML = `<div class='mal resultado'> <div class='feedback'>OOPS! <br> Algo anda mal</div> <a href=""> <img src="./botones/volverj.svg" alt='boton verde' class='boton' /></div></a>`;
});

function drag(e){
	e.dataTransfer.setData('text', e.target.id);
}

function permitedrop(e){
	e.preventDefault();
}

function drop(e){
	e.preventDefault();
	let data = e.dataTransfer.getData('text');
	e.target.appendChild(document.getElementById(data));
}