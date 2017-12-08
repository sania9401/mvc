<?php

class Router {

	private $routes;

	public function __construct()
	{	//получаем маршруты
		$routesPath=ROOT.'/config/routes.php';
		$this->routes= include ($routesPath);
	}

	private function getURI()
	{
	
		//получить строку запроса
		if (!empty($_SERVER['REQUEST_URI'])){
			return trim ($_SERVER['REQUEST_URI'], '/');
		}
	}


	public function run()
	{

		$uri=$this->getURI();    //получаем uri
		foreach ($this->routes as $uriPattern =>$path){ 
			if (preg_match("~$uriPattern~", $uri)) {                              //ищем совпадения с роутами

				//получаем внутренний путь из внешнего
				$internalRoute=preg_replace("~$uriPattern~", $path, $uri);

				$segments=explode('/', $internalRoute);				                      //разбиваем строку uri
				$controllerName=ucfirst(array_shift($segments)).'Controller';     //строим имя контроллера который будет обрабатывать
				$actionName='action'.ucfirst(array_shift($segments));			  //метод
			}
			$parametrs=$segments;

			$controllerFile=ROOT.'/controllers/'.$controllerName.'.php';          //подключаем файл с контроллером
			if (file_exists($controllerFile)){
				include_once($controllerFile);
			

				                                                                  //создать объект, вызвать метод
				$controllerObject= new $controllerName;
				$result=call_user_func_array(array($controllerObject, $actionName), $parametrs);
				if ($result != null){
						break;
				}

			}
		}
	}

}


?>