<?php

	namespace App;

	class Connection{

		public function getDB(){
			$dsl = 'mysql:host=localhost;dbname=db_portal_noticias';
			$usuario = 'root';
			$senha = '1234';

			try {
				$conexao = new \PDO($dsl, $usuario, $senha);

				return $conexao;

			} catch (PDOException $e) {
				echo 'Erro: ' .$e->getCode().' Mensagem: '.$e->getMessage();
			}
		}	

	}

	

?>