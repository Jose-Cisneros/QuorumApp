<?php $archivo = "contador.txt";
$contador = 0;
$fp = fopen($archivo,"r");
$contador = fread($fp, filesize($archivo));
fclose($fp);

echo $contador;

?>
