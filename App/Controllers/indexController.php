<?php
	
	namespace App\Controllers;

	use MF\Controller\Action;

	use App\Connection;
	use App\Models\Noticias;


	class IndexController extends Action {
		
		public function index(){

			$conn = new Connection();
			$noticias = new Noticias();
			$conexao = $conn->getDB();


			$this->view->noticias = $noticias->readNoticias($conexao);

			$this->render("index", "layout");

		}

		public function create(){

			session_start();

			if($_SESSION['conta'] !== '' && $_SESSION['conta']['funcao'] == 1){
				$this->render("create", "layoutCreate");
			}else{
				header('Location: /');
			}

		}

		public function alter(){

			session_start();

			if($_SESSION['conta'] !== '' && $_SESSION['conta']['funcao'] == 1){
				$conn = new Connection();
				$noticias = new Noticias();
				$conexao = $conn->getDB();

				if(!$_REQUEST['id']){
					header('Location: /');
					die();
				}else{
					$id = $_REQUEST['id'];
				}

				$this->view->noticia = $noticias->readUmaNoticia($conexao, $id);

				$this->render("alter", "layout");
			}else{
				header('Location: /');
			}
		}
	}

?>


<!-- composer dump-autoload -o -->