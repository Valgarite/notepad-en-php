<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de texto</title>
</head>
<body>
    <form name="text_editor" action="./assets/php/guardar.php" method="post" target="_self" id="text">
        <label for="file_name">Nombre del archivo</label><br>
        <input type="text" name="file_name" id="file_name"><br>
        
        <label for="file_content">Contenido</label><br>
        <textarea name="file_content" id="file_content" cols="150" rows="25" wrap="off" placeholder="Comienza a escribir aquí..." autocorrect="on" ></textarea><br>
        
        <button id="guardar" type="submit">Guardar</button>    
    </form>

    <form method="post">
        <input type="text" name="folder_text" placeholder="Nombre de la carpeta nueva"/>
        <input type="submit" name="button1" class="button" value="Crear carpeta nueva" />
    </form>
    <div>
        <?php
            include("./assets/php/listar.php");
        ?>
    </div>

</body>
</html>