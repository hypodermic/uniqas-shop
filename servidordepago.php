<?php

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require 'culqi/vendor/autoload.php';
  require 'culqi/lib/culqi.php';

  // Configurar tu API Key y autenticación
  $SECRET_API_KEY = "sk_test_fJxsdAHTwgAIZQa2";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));

  // Creando Cargo a una tarjeta
  $charge = $culqi->Charges->create(
      array(
        "amount" => $_POST['monto'],
        "capture" => true,
        "currency_code" => "PEN",
		"email" => $_POST['email'],
        "description" => "Venta de prueba",
        "installments" => 0,
        "metadata" => array("test"=>"test"),
        "source_id" => $_POST['token']
      )
  );
  // Respuesta
  echo json_encode($charge);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
  
}
?>