<?php

class frontcontroller
{
	var $config;
	var $request;
	
	public function __construct($configfile)
	{
		$this->setConfig($configfile);
		$this->getRequest();
		$bootstrap = new bootstrap($this->config, $this->request);	// Le pasamos la config y la peticion recibida al bootstrap
		$bootstrap->run();											// Iniciamos el patron bootstrap. Un controlador para dominarlos a todos											
	}
	
	
	public function getRequest()
	{	// Obtengo el array peticion que tendra el controlador y la accion a llevar a cabo
		$request = model_general_request::getRequest();
		$this->request = $request;
	}
	
	public function setConfig($configfile)
	{	// Interpreta el ficherro de config pasado en el constructor
		$this->config = parse_ini_file($configfile, TRUE);
	}
	

}