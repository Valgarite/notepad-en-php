<?php

include('abrir_directorio.php');

echo $directory, '<br>';

$file_name="";
if(!empty($_GET["file_name"])){
    $file_name = $_GET["file_name"];
    $directory = $directory . $file_name;
    echo 'en directorio: ', $directory, '<br>';
}

echo $directory, '<br>';

if ($gestor = opendir($directory)) {
    // TABLA DE ARCHIVOS.
    echo '<table border=1>';

    //LOOP PARA LISTAR LA TABLA DE ARCHIVOS.
    while (false !== ($entrada = readdir($gestor))) {
        $nombre_url = str_replace(' ', '%20', $entrada);
        $nombre_visual = str_replace('%20', ' ', $entrada);

        echo '<tr>', 
                '<td>',
                    '<a href=.?file_name=', $file_name , '/', $nombre_url,'>', $nombre_visual,'</a>',
                '</td>',
                '<td>',
                    '<a href=./assets/php/editar_archivo.php/?file_name=', $nombre_url, '>Editar</a>',
                '</td>',
                '<td>',
                    '<a href=./assets/php/eliminar_archivo.php/?file_name=', $nombre_url, '>Borrar</a>',
                '</td>',
            '</tr>';
    }
    closedir($gestor);
    echo '</table>';
   }
?>