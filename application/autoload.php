<?php

// Simple funcion donde cogeremos la clase pasada ( que estara escrita con
// guiones bajos describiendo la jerarquia de directorios donde se encuentra)
// y por ello le quitamos los guiones bajos y los convertimos en / para indicar
// la ruta en la que se encuentra la clase para poder cargarla en la app
function __autoload($name)
{
	$path = explode('_',$name);
	$path = implode('/',$path);
	
	include ('../application/'.$path.'.php');	
}