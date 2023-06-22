<?php

//Aquí manejo todo el enrutamiento de los archivos del gestor.
//CADA RUTA ASOCIADA A UNA ACCIÓN TUVO QUE HABER SIDO GENERADA POR ESTE BLOQUE.

//1. La función validar_avance es responsable de evitar que se acceda a carpetas fuera de
//  la carpeta raíz /textfiles/ en la que se almacenará toda la información creada por el
//  usuario utilizando el gestor. Es decir, que esta forma de enrutamiento evita que el usuario
//  pueda eliminar archivos propios del gestor.

try {
    $go_to = @$_GET['go_to'];
    $went = validar_avance($go_to);
} catch (\Throwable $th) {
    $went = '/textfiles';
} finally {
    
    $path = $working_dir . $went;
    $path = str_replace(' ', '%20', $path);
    $path = filter_var($path, FILTER_SANITIZE_URL);
}
echo 'WORKING DIR: ', $working_dir, '<br>';
echo 'PATH: ', $path, '<br>';
if (array_key_exists('button1', $_POST)) {
    $newf = $_POST['folder_name'];

    crear_carpeta($path, $newf);
}
if (array_key_exists('button2', $_POST)) {
    header('Location: index.php');
    die();
}

$dir_result = scandir($path);
$dir_result = array_diff($dir_result, ['.', '..']);
echo '<table border=1>';
echo '<tr>
        <th>TIPO</th>
        <th>NOMBRE</th>
        <th>ACCIONES</th>
    </tr>';
foreach ($dir_result as $dir) {
    $this_file_exists = is_file($path . "/" . $dir);
    $this_dir_exists = is_dir($path . "/" . $dir);
    echo '<tr>';
    //Indica si es archivo o directorio y prepara el enrutamiento.
    $echoed_went = str_replace('/textfiles', '', $went);
    if ($this_file_exists) {
        echo '<td>';
        echo "FILE";
        echo '</td>';
        echo '<td>';
        echo '<a href=?go_to=', $echoed_went,'&loaded_name=',$dir,'&loaded_content=',@$dir_content,'>';
    } else if ($this_dir_exists) {
        echo '<td>';
        echo "FOLDER";
        echo '</td>';
        echo '<td>';
        echo '<a href=?go_to=', $echoed_went, '/', $dir, '>';
    }

    //Nombre del archivo o directorio.
    $echoed_name = str_replace('%20', ' ', $dir);
    echo $echoed_name, '</a>';

    echo '</td>';
    echo '</tr>';
}
echo '</table>';
function crear_carpeta(string $path, string $new_folder_name)
{
    echo "SE CREARÁ LA CARPETA DENTRO DE: ", $path, '<br>';
    $new_folder = $path . '/' . $new_folder_name;
    if (!file_exists($new_folder)) {
        echo "CARPETA CREADA EN: ", $new_folder, '<br>';
        mkdir($new_folder);
    }
}

function validar_avance(string $selected_folder = '/textfiles')
{
    if (
        strpos($selected_folder, '\.') === false &&
        strpos($selected_folder, '\..') === false &&
        strpos($selected_folder, '/.') === false &&
        strpos($selected_folder, '/..') === false
    ) {
        return '/textfiles' . $selected_folder;
    } else {
        header( 'Location: index.php' );
        die();
    }
}
?>