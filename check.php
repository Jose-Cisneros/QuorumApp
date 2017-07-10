<?php if ($_SERVER["REQUEST_METHOD"] == "POST"){

  $archivo = "contador.txt";
  $contador = 0;
  $fp = fopen($archivo,"r");
  $contador = fread($fp, filesize($archivo));
  fclose($fp);


  echo 'OK-';
  $request_body = file_get_contents('php://input');
  $data = json_decode($request_body);
  $ac = $data->config->action;

  if ($ac != 'test') {
    if ($ac == 'barcode.checked_in'){

      echo "Incrementar contador";
      $contador = $contador + 1;
      echo "Totales : $contador";

    }

    if ($ac == 'barcode.un_checked_in'){

      echo "Decrementar contador";
      $contador = $contador - 1;

    }


    $fp = fopen($archivo,"w+");
    fwrite($fp, $contador);
    fclose($fp);


  } else {

    echo "Esto es una prueba";

  }


}
?>
