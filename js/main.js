jQuery(document).on("submit", "#formlogin", function(event) {
  event.preventDefault();

  $.ajax({
    type: "POST",
    url: "login.php",
    data: $(this).serialize(),
    dataType: "json",
    beforeSend: function() {
        $('#boton').val('Cargador Sistema...'); 
    }
  })
    .done(function(respuesta) {
      console.log(respuesta);
      if (!respuesta.error) {
        if (respuesta.Tipo == 1) {
          location.href = "procesos/admin/index.php";
        } else if (respuesta.Tipo == 2) {
          location.href = "procesos/usuario/index.php";
        } 
          
        }else {
          $(".error").slideDown("slow");
          setTimeout(function() {
            $(".error").slideUp("slow");
          },1500);
          $('#boton').val('Iniciar Sesion');
      }
    })
    .fail(function(resp) {
      console.log(resp.responseText);
    })
    .always(function() {
      console.log("Complete");
    });
});
