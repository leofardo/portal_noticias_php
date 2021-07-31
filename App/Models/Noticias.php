<?php

	namespace App\Models;

	class Noticias{

		function readNoticias($conexao){
			$this->conexao = $conexao;

			$query = "SELECT titulo, noticia, id FROM tb_noticia";

			$stmt = $this->conexao->prepare($query);

			$stmt->execute();

			$noticias = $stmt->fetchAll(\PDO::FETCH_ASSOC);

			return $noticias;
		}

		function readUmaNoticia($conexao, $id){
			$this->conexao = $conexao;
			$this->id = $id;

			$query = "SELECT titulo, noticia, id FROM tb_noticia WHERE id = $this->id";

			$stmt = $this->conexao->prepare($query);

			$stmt->execute();

			$noticias = $stmt->fetch(\PDO::FETCH_ASSOC);

			return $noticias;
		}

		function addNoticias($conexao, $noticia){

			$this->conexao = $conexao;

			$titulo = $noticia['titulo'];
			$noticia = $noticia['noticia'];

			$query = 'INSERT INTO tb_noticia (titulo, noticia) VALUES' . "('$titulo', '$noticia')";

			$retorno = $this->conexao->exec($query);
		}

		function removeNoticias($conexao, $id){

			$this->conexao = $conexao;
			$this->id = $id;

			$query = "DELETE FROM tb_noticia WHERE id = :id";

			$stmt = $this->conexao->prepare($query);
  			$stmt->bindParam(':id', $this->id);
			$stmt->execute();
		}

		function alterNoticia($conexao, $id, $novaNoticia){

			// bloquear crud caso o array venha vazio;

			$this->conexao = $conexao;
			$this->novaNoticia = $novaNoticia;
			$this->id = $id;

			$stmt = $this->conexao->prepare('UPDATE tb_noticia SET titulo = :titulo, noticia = :noticia WHERE id = :id');
			$stmt->execute(array(
			    ':id'   => $this->id,
			    ':titulo' => $this->novaNoticia['titulo'],
			    ':noticia' => $this->novaNoticia['noticia']
			));
		}
	}

?>