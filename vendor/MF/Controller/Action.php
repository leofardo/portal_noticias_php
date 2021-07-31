<?php

	namespace MF\Controller;

	abstract class Action{

		protected $view;

		public function __construct(){
			$this->view = new \stdClass();
		}

		protected function render($view, $layout){
			$this->view->page = $view;

			if(file_exists("../App/Views/$layout.phtml")){
				require_once realpath("../App/Views/$layout.phtml");
			}else{
				$this->content();
			}
		}

		protected function content(){
			$pasta = $this->view->page;

			// lançei a gambiarra aqui, depois arruma KK

			// $classAtual = get_class($this);
			// $classAtual = str_replace("App\\Controllers\\", "", $classAtual);
			// $classAtual = strtolower(str_replace("Controller", "", $classAtual));

			// require_once realpath("../App/Views/$classAtual/". $this->view->page . ".phtml");

			require_once realpath("../App/Views/$pasta/". $this->view->page . ".phtml");

		}
		
	}

?>