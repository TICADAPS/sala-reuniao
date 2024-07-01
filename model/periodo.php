<?php
require_once "db_mysqli.php";

class Periodo
{

	function listar()
	{
		$db = new Database();
		
		$sql = ' select * from periodo order by periodoinicial;' ;
		return $db->query($sql);
	}
	
	function abrir($id)
	{
		
		$db = new Database();
		
		$sql = ' select * from periodo where id = '. $id; ;
		return $db->query($sql);
	}
	
	function salvar($id,$pinicial,$pfinal)
	{
	
		$db = new Database();
		
		// inserir
		if($id == 0)
		{
			$sql = 'insert into periodo ( periodoinicial,periodofinal ) values ("'.$pinicial.'","'.$pfinal.'")';
			return $db->query_insert($sql);
		}
		else
		{ 
			// atualizar
			$sql = ' update periodo set periodoinicial = "'.$pinicial.'", periodofinal = "'.$pfinal.'" where id = ' .$id;
			return $db->query_update($sql);

		}
	}
	
	function excluir($id)
	{
		$db = new Database();
		$sql = 'delete from periodo where id = '.$id; 
		return $db->query_update($sql);
	}
	
	
	function total()
	{
		$db = new Database();
		$sql = 'select count(id) as total from periodo  ';
		return $db->query($sql);
		
	}
}

?>