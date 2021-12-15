// una vez que termine de cargar el dom
$(document).ready(function() {
  // selector del link
  var a = $('#juego');

  // evento click del link
  // también se puede usar a.click(function(e) {})
  a.on('click', function(e) {
    // esto es sólo un ejemplo de cómo pasar parámetros
    var id_row = 1;

    // método ajax para contar el click
    $.ajax({
      url: 'curso.php',
      type: 'post',
      data: {id: id_row},
      // en caso de éxito de la petición
      success: function(data) {
        console.log(data);
      }
    })
  })
});