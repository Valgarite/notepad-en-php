<?php
if(empty($directory)){
    $directory = __DIR__ . '/textfiles/';
    define("BASEDIR", $directory);
}else{
    echo 'en abrir directorio', $directory;
    chdir($directory);
}


?>