<?php
class Page extends Element{
	public function __construct(){
		parent::__construct('html');
	}

	public function show(){
		$this->run();
		parent::show();
	}

	public function run(){
		if ($_GET) {
			$class = isset($_GET['class']) ? $_GET['class'] : NULL;
			$method = isset($_GET['method']) ? $_GET['method'] : NULL;

			if ($class) {
				$object = $class == get_class($this) ? $this : new $class;
				if (method_exists($object, $method)) {
					call_user_func(array($object, $method), $_GET);
				}else{
					throw new Exception("Método {$method} inexistente na classe {$class}");
					
				}
			}elseif (function_exists($method)) {
				call_user_func($method, $_GET);
			}
		}
	}
}

?>