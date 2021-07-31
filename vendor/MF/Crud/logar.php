<?php

	namespace MF\Crud;

	class Logar{

		public function validar($dados){
			foreach ($dados as $key => $value){
				if($value == ''){
					header("Location: /login?error=1"); //alertar que tem campo vazio
					die();
				}
			}

			return $dados;
		}

	}


?>