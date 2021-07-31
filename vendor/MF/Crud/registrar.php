<?php
	namespace MF\Crud;

	class Registrar{

		function validar($dados){
			foreach ($dados as $key => $value){
				if($value == ''){
					header("Location: /registrar?error=1"); //alertar que tem campo vazio
					die();
				}
			}

			if($dados['pass'] === $dados['passRepeat']){
				return $dados;
			}else{
				header("Location: /registrar?error=2");
			}	
		}
	}
?>