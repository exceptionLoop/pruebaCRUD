<?php


class model_general_request
{
	public static function getRequest()
	{	// Array temporal de la peticion URI desde la que voy a trabajar
		$requestd = explode('/',$_SERVER['REQUEST_URI']);
		// Si existe el fichero del controlador con el nombre de la peticion
		if(file_exists($_SERVER['DOCUMENT_ROOT'].
					   '/../application/controllers/'.
					   $requestd[1].'.php'))
			$request['controller']=$requestd[1];	// Alamaceno en el nuevo array de peticion el controlador
		else if($requestd[1]!=='')
			$request['controller']='error';			// Si me pasan un nombre de controlador que no existe
		else 
			$request['controller']='index';			// Si por ejemplo lo pasan vacio o nada
		
		if(isset($requestd[2]) && $requestd[2]!=='')// Si se le pasa una accion al controlador
		{
			$request['action'] = $requestd[2];
			for($i=3;$i<count($requestd);$i+=2)		// Si se le pasan parametros a la accion del controlador
				{
					$request['params'][$requestd[$i]]=$requestd[$i+1];
				}
		}
		else 
			$request['action'] = 'index';			// Por defecto lo mandamos al index
		
		
		return $request;
	}
}