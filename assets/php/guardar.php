<?php

header( 'Location: ../../index.php' );
include_once('abrir_directorio.php');

$file = $directory . $_POST['file_name'] . '.txt';
$texto = $_POST['file_content'];

$file = str_replace(' ', '%20', $file);
$file = filter_var($file, FILTER_SANITIZE_URL);

echo $file;

$fp = fopen($file, "w");
fwrite($fp, $texto);
fclose($fp);

?>