<?php
	
	namespace App\Controllers;

	use MF\Controller\Action;
	use MF\Crud\Registrar;
	use MF\Crud\Logar;

	use App\Connection;
	use App\Models\Noticias;
	use App\Models\Contas;


	class CrudController extends Action {		
		public function add(){

			session_start();

			if($_SESSION['conta'] !== '' && $_SESSION['conta']['funcao'] == 1){

				$conn = new Connection();
				$noticias = new Noticias();
				$conexao = $conn->getDB();

				$this->noticia = $_POST;

				if($this->noticia['titulo'] != '' && $this->noticia['noticia'] != ''){
					if($this->noticia){
						$noticias->addNoticias($conexao, $this->noticia);
					}
				}else{
					header('Location: /create?erro=1');
					die();
				}

				header('Location: /');
			}else{
				header('Location: /');
			}	

		}

		public function delete(){

			session_start();

			if($_SESSION['conta'] !== '' && $_SESSION['conta']['funcao'] == 1){
				$conn = new Connection();
				$noticias = new Noticias();
				$conexao = $conn->getDB();
				
				$this->id = $_REQUEST['id'];

				if($this->id){
					$noticias->removeNoticias($conexao, $this->id);
				}

				header('Location: /');

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
				
				$this->novaNoticia = $_POST;
				$this->$id = $this->novaNoticia['id'];

				if($this->novaNoticia){
					$noticias->alterNoticia($conexao, $this->$id, $this->novaNoticia);
				}

				header('Location: /');
			}else{
				header('Location: /');
			}
			
		}


		// Login e registro

		public function registrar(){
			if($_POST){
				$registro = new Registrar();

				$conta = $registro->validar($_POST);

				if($conta){
					$conn = new Connection();
					$conexao = $conn->getDB();
					$contasModel = new Contas();

					$conta = $contasModel->verificarRepetida($conexao, $conta);

					$contasModel->addConta($conexao, $conta);
					
					header('Location: /?registro=202');

				}else{
					echo "erro mano";
				}
			

			}else{
				header('Location: /');
			}	
		}

		public function login(){

			if($_POST){
				$login = new Logar();

				$conta = $login->validar($_POST);

				if($conta){
					$conn = new Connection();
					$conexao = $conn->getDB();
					$contasModel = new Contas();

					$conta = $contasModel->logarConta($conexao, $conta);

					session_start();

					$_SESSION['conta'] = $conta;

					header('Location: /');


				}else{
					echo "erro mano";	
				}


			}else{
				header('Location: /');
			}
		}

		public function logoff(){
			session_start();
			session_destroy();
			header('Location: /');
		}


		public function promover(){
			session_start();

			if($_SESSION['conta'] !== '' && $_SESSION['conta']['funcao'] == 1){
				$conn = new Connection();
				$contas = new Contas();
				$conexao = $conn->getDB();
				
				$this->id = $_REQUEST['id'];

				if($this->id){
					$contas->promoverConta($conexao, $this->id);
				}

				header('Location: /contas');

			}else{
				header('Location: /');
			}	
		}
	}

?>


<!-- composer dump-autoload -o -->