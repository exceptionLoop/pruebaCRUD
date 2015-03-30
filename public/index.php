<?php

// Las rutas de ficheros de la aplicación estan por enciama de la "jaula" web
// para que no se puedan acceder a ellos( habrá que protegerse de un "directory 
// traversal" en el servidor web posteriormente

// Definimos variable donde recogemos archivo de configuracion
$configfile = '../application/configs/settings.ini';
// Pretendo que sea el unico include, y para eso cargo dinamicamente las clases con el autoload del php autoload.php
include ('../application/autoload.php');

// Aplico el patron frontcontroller con el archivo de configuracion dado
$app = new frontcontroller($configfile);


