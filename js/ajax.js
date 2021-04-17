//Esto se ejecutará al momento de cargarse la pagina.
$(document).ready(function(){
  
  //Obtengo el ID del CheckBox que acabo de dar click
  $("input:checkbox").click(function() {
  
    //Obtener el Id del CheckBox
    var id = $(this).attr('id')

    //Obtener el Valor del CheckBox
    if( $(this).is(':checked') ){
      var value = true
    }else{
      var value = false
    }
    



    $.ajax({
      url: '../js/grabarcheck.php',
      type: 'POST',
      data: {'id' : id,
             'value' : value}
    })

    .done(function(resultado){
      $('#datosresultado').html(resultado)
    })

    .fail(function(){
      alert('Error al cargar las empresas')
    })
  });

})