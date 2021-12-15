$(buscar_datoss());

function buscar_datoss(busqueda){
	$.ajax({
		url: 'buscarcalificacion.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {busqueda: busqueda},
	})
	.done(function(respuesta){
		$("#datosc").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_estudiante', function(){
	var valor = $(this).val();
	if (valor !== "") {
		buscar_datoss(valor);
	}else{
		buscar_datoss();
	}
});