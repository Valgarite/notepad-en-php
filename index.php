<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de texto</title>
</head>
<body>
    <form name="text_save" method="post" target="_self" id="text">
        <label for="file_name">Nombre del archivo</label><br>
        <input type="text" name="file_name" id="file_name" value=<?php
            echo @$_GET['loaded_name'];
        ?>><br>
        
        <label for="file_content">Contenido</label><br>
        <textarea name="file_content" id="file_content" cols="150" rows="25" wrap="off" placeholder="Comienza a escribir aquí..." autocorrect="on"><?php
            echo @$_GET['loaded_content'];
        ?></textarea><br>
        
        <button id="guardar" type="submit">Guardar</button>
    </form>

    <form method="post" target="_self">
        <input type="text" name="folder_name" placeholder="Nombre de la carpeta nueva"/>
        <input type="submit" name="button1" class="button" value="Crear carpeta nueva" onclick=""/>
        <input type="submit" name="button2" class="button" value="Volver a carpeta principal" />
    </form>
    <div>
        <?php
            $working_dir = getcwd();
            include_once('./assets/php/file_explorer.php');
            echo 'PASSED PATH: ', $path, '<br>';
            include_once('./assets/php/guardar.php');
        ?>
    </div>

</body>
</html>