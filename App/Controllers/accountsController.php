<?php
	
	namespace App\Controllers;

	use MF\Controller\Action;

	use App\Connection;
	use App\Models\Contas;

	class AccountsController extends Action {
		function login(){

			session_start();

			if(!($_SESSION['conta'] !== '' && $_SESSION['conta']['funcao'] == 1)){
				$this->render('login', 'layoutLogin');
			}else{
				header('Location: /');
			}	
		}

		function registrar(){

			session_start();

			if(!($_SESSION['conta'] !== '' && $_SESSION['conta']['funcao'] == 1)){
				$this->render('registrar', 'layoutRegistro');
			}else{
				header('Location: /');
			}
		}

		function contas(){
			session_start();

			if(($_SESSION['conta'] !== '' && $_SESSION['conta']['funcao'] == 1)){
				$conn = new Connection();
				$contas = new Contas();
				$conexao = $conn->getDB();

				$this->view->contas = $contas->recuperarConta($conexao);

				$this->render("contas", "layoutContas");

			}else{
				header('Location: /');
			}
		}
		
	}

?>


<!-- composer dump-autoload -o -->