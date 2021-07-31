<?php 

	namespace MF\Crud;

	class Promover{

		public function upgradeAccount($conexao, $conta){

			session_start();

			$this->conexao = $conexao;
			$this->id = $conta['id'];

			if(!($_SESSION['conta']['id'] == $this->id)){

				if($conta['funcao'] == 0){
					$funcao = 1;
				}else if($conta['funcao'] == 1){
					$funcao = 0;
				}

				$stmt = $this->conexao->prepare('UPDATE tb_contas SET funcao = :funcao WHERE id = :id');
				$stmt->execute(array(
				    ':id'   => $this->id,
				    ':funcao' => $funcao
				));

				$conta = $stmt->fetch(\PDO::FETCH_ASSOC);

			}
			
		}
	}
	
?>