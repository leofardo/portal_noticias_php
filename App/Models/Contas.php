<?php

	namespace App\Models;

	use MF\Crud\Promover;

	class Contas{
		function addConta($conexao, $dados){

			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$senha = $_POST['pass'];

			$options = [
				'cost' => 10
			];

			$senha = password_hash($senha, PASSWORD_DEFAULT, $options);

			$conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		 	$query = "INSERT INTO tb_contas (nome, email, senha, funcao)
			VALUES" . "('$nome', '$email', '$senha', 0)";

			$conexao->exec($query);
			
		}

		function verificarRepetida($conexao, $conta){
			$this->conexao = $conexao;

			$query = "SELECT * FROM tb_contas";

			$stmt = $this->conexao->prepare($query);

			$stmt->execute();

			$contas = $stmt->fetchAll(\PDO::FETCH_ASSOC);

			foreach($contas as $key => $value){
				if($value['email'] === $conta['email']){
					header('Location: /registrar?error=3');//conta ja existente;
					die();
				}
			}

			return $conta;	
		}

		function logarConta($conexao, $conta){
			$this->conexao = $conexao;

			$email = $conta['email'];

			$query = "SELECT nome, email, senha, funcao, id FROM tb_contas WHERE email = '$email'";

			$stmt = $this->conexao->prepare($query);

			$stmt->execute();

			$contaSql = $stmt->fetch(\PDO::FETCH_ASSOC);

			$hash = $contaSql['senha'];

			if(($contaSql['email'] === $conta['email']) && (password_verify($conta['pass'], $hash))){
				$usuario = ['nome' => $contaSql['nome'], 'email' => $contaSql['email'], 'funcao' => $contaSql['funcao'], 'id' => $contaSql['id']];

				return $usuario;
				die();
			}

	

			header('Location: /login?error=2'); //conta nao existente;
			die();

		}

		function recuperarConta($conexao){
			$this->conexao = $conexao;

			$query = "SELECT nome, email, id, funcao FROM tb_contas";

			$stmt = $this->conexao->prepare($query);

			$stmt->execute();

			$contas = $stmt->fetchAll(\PDO::FETCH_ASSOC);

			for ($i=0; $i < count($contas); $i++) { 
				if($contas[$i]['funcao'] == 1){
					$contas[$i]['funcao'] = 'Administrador';
				}else if($contas[$i]['funcao'] == 0){
					$contas[$i]['funcao'] = 'Membro';
				}
			}

			return $contas;

		}

		function promoverConta($conexao, $id){
			$this->conexao = $conexao;
			$this->id = $id;

			$query = "SELECT nome, funcao, id FROM tb_contas where id = $this->id";

			$stmt = $this->conexao->prepare($query);

			$stmt->execute();

			$conta = $stmt->fetch(\PDO::FETCH_ASSOC);

			if($conta){
				$promover = new Promover();

				$promover->upgradeAccount($this->conexao, $conta);
			}

		}
	}

?>

