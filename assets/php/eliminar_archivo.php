<?php
    header( 'Location: ../../../index.php' );
    $name = $_GET["file_name"];
    $name = str_replace(' ', '%20', $name);
    unlink(__DIR__ . '\textfiles\\' . $name);
?>