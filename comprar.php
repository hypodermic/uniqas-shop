<div id="comprar">
<h1>Pack</h1>
<h2>incluye todo lo que ves</h2>
<a class="button" id="buyButton">comprar</a>
</div>
<script>
  Culqi.settings({
    title: 'uniqas store',
    currency: 'PEN',
    description: 'pack y envio',
    amount: 6000
  });
</script>
<script>
$('#buyButton').on('click', function(e) {
    // Abre el formulario con la configuración en Culqi.settings
    Culqi.open();
    e.preventDefault();
});
</script>
<script>

function culqi() {
  if (Culqi.token) { // ¡Objeto Token creado exitosamente!
      var token = Culqi.token.id;
	  var email = Culqi.token.email;
      //alert('Se ha creado un token:' + token);
	  $.ajax({
		  url: 'includes/servidordepago.php',
		  method: 'post',
		  data: {
			  token: token,
			  monto: 6000,
			  email: email,
		  },
		  dataType: 'JSON',
		  success: function(data){
			  console.log(data);
		  },
		  error: function(error_data){
			  console.log(error_data);
		  }
	  })
  } else { // ¡Hubo algún problema!
      // Mostramos JSON de objeto error en consola
      console.log(Culqi.error);
      alert(Culqi.error.user_message);
  }
};

</script>