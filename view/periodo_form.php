<?php

require_once "seguranca.php";
require_once "../controller/periodoController.php";

$periodoController = new periodoController();

$periodo = $periodoController->excluir();
$periodo = $periodoController->salvar();
$periodo = $periodoController->abrir();
//var_dump($periodo[0]);
if (isset($periodo[0])){
    $pinicial = $periodo[0]['periodoinicial'];    
    $id = $periodo[0]['id'];
}
    //extract($periodo[0]);

if (!isset($id)) {
    $pinicial = '';
    $id = 0;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


    <script src="js/jquery.js"></script>
    <script src="js/jquery.datetimepicker.full.js"></script>
    <script src="js/dateformat.js"></script>

    <!-- <link href="css/select2.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css">

    <!-- <script src="js/select2.min.js"></script> -->
    <script src="js/lib.js"></script>

</head>
<title>Cadastro de periodos</title>

<body>

    <!-- menu esquerdo -->
    <?php include "menu_esquerdo.php"; ?>

    <!-- conteudo -->
    <div class="corpo">

        <h3> Cadastro de Períodos </h3>

        <form name="form1" method="post" target="_self">

            <input type="hidden" name="id" value="<?= $id ?>" />

            <table class="tabela_comum" cellpadding="4" cellspacing="4">
                <tr>
                    <td width="100"> Período </td>
                    <td><input type="text" name="pinicial" id="pinicial" value="<?= $pinicial ?>" /> </td>
                    <td width="30"></td>
                    <td width="100"> </td>
                    <td> </td>
                </tr>                
            </table>


            <input type="submit" name="salvar" value="Salvar" class="btn1" />

            <input type="submit" name="excluir" value="Excluir" class="btn1" />

        </form>

    </div>

</body>
<script src="js/mask.js"></script>
<script>
$('#pinicial').mask('00:00:00'); //CPF
//$('#pfinal').mask('00:00:00'); //CPF
</script>
</html>