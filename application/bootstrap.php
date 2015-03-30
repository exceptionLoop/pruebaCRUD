<?php

class bootstrap
{	// Atributos que le voy pasar a través del constructor, que a su vez se los paso a través del (patron)frontcontroller
	var $config;
	var $request;
	
	public function __construct($config, $request)
	{
		$this->request = $request;
		$this->config = $config;
	}
	
	public function run()
	{
		$this->initSession();											// Iniciamos la sesion
		$this->initRegister();											// Registramos la sesion
		$this->initDbR();												// Iniciamos singleton en la BBDD de produccion
		$this->initDbW();												// Iniciamos singleton en la BBDD de desarrollo
		$this->initAcl();												// Establecemos permisos en funcion de quien haya iniciado sesion
		
		$controller = 'controllers_'.$this->request['controller'];		// Localizamos el controlador
		$obj = new $controller($this->config,$this->request);			// Lo instanciammos
		$content = $obj->{$this->request['action']}();					// Almacenamos el contenido obtenido del buffer de lectura
		$layout = $obj->getLayout();									// Obtenemos la plantilla
		$this->renderLayout($layout,$content);							// Renderizamos el contenido en la plantilla
		
	}
	
	public function renderLayout($layout, $content)
	{
		include('../application/views/layouts/'.
				$layout.
				'.phtml');
	}
	
	
	protected function initAcl()
	{
		
		$publicControllers = array ('index', 'author');
		if(isset($_SESSION['iduser']))
		{		
			$acl = new model_acl($this->config['database']);
			$data = $acl->getAcl($_SESSION['iduser'], $this->request);

			if(!isset($data))
				header('Location: /author/login');
		}
		elseif (!in_array($this->request['controller'], $publicControllers))
		{

			header('Location: /author/login');
		} 	
		else
		{
			//echo "ninguno";	
		}			
	}
	
	public function initSession()
	{
		session_start();
	}
	
	public function initRegister()
	{
		$_SESSION['register']='';
	}
	
	public function initDbR()
	{
		$_SESSION['register']['linkR'] = 
			model_db::getInstance($this->config['databaseR'])->link;		
	}
	
	public function initDbW()
	{
		$_SESSION['register']['linkW'] = 
			model_db::getInstance($this->config['databaseW'])->link;
	}

}