<?php

require "util.php";
require "../model/periodo.php";

class periodoController
{
	
	function salvar()
	{
		if(isset($_POST['salvar']))
		{
			$pinicial = Util::clearparam($_POST['pinicial']);
			$pfinal = Util::clearparam($_POST['pfinal']);
			$id = Util::clearparam($_POST['id']);

			$periodo = new Periodo();
			$periodo->salvar($id,$pinicial,$pfinal);
			header("Location: periodo_list.php");
			exit();
		}
	}
	
	function excluir()
	{
		
		if(isset($_POST['excluir']))
		{
			$id = Util::clearparam($_POST['id']);
			
			$periodo = new Periodo();
			$periodo->excluir($id);
		
			header("Location: periodo_list.php");
			exit();
				
		}

	}
	
	function abrir()
	{
		
		if(isset($_GET['id']) && is_numeric($_GET['id']))
		{
			$periodo = new Periodo();
			return $periodo->abrir( $_GET['id']);
		}	
		
	}

	// listagem
	function listarcontroller()
	{
		
		$periodo = new Periodo();
		
		$linhas = $periodo->listar();
		
		$tabela = '';
		foreach($linhas as $linha)
		{
			$tabela .= '<tr>
							<td>'.$linha['id'].'</td>
							<td><a href="periodo_form.php?id='.$linha['id'].'">'.$linha['periodoinicial'].'</a></td>
							<td><a href="periodo_form.php?id='.$linha['id'].'">'.$linha['periodofinal'].'</a></td>
						</tr>		
							';
		}
		
		return $tabela;
	}
	
}

?>