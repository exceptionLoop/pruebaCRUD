<?php


class model_general_views
{
	public static function renderView($data, $request)
	{	// Abrimos buffer de salida
		ob_start();
			include ('../application/views/'.
						$request['controller'].
						'/'.
						$request['action'].'.phtml');
			$content=ob_get_contents();					// "Almacenamos" el buffer
		ob_end_clean();									// Cerramos
		return $content;								// Devolvemos resultado
	}
}