<?php 
session_start();
include("../../config/config.php"); ?>
<?php include(DIRREQ . "sala-reuniao/libs/html/header.php"); ?>
<?php

$objEvents = new \Classes\ClassEvents();
@$events = $objEvents->getEventsById($_GET['id']);
@$date = new \DateTime($events['start']);
?>
<div class="container">
    <?php
    if (isset($_SESSION['reservado'])) {
        echo '<div class="alert alert-success"><strong>Sucesso!</strong> ' . $_SESSION['reservado'] . '<a href="../index.php" class="alert-link"> Deseja Voltar? clique aqui... </a></div>';
        unset($_SESSION['reservado']);
    } else { ?>
        <form name="formEdit" id="formEdit" method="post" action="<?php echo DIRPAGE . 'sala-reuniao/controller/ControllerEdit.php'; ?>">
            <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>"><br>
            <div class="row"></div>
            <label class="form-label">Data:</label> 
            <input class="form-control" type="date" name="date" id="date" value="<?php echo $events['dia']; ?>"><br>

            <label class="form-check-label">Período:</label>
            <select class="form-select" name="time" id="time">
                <option value=""><?php echo $events['start']; ?></option>
                <option value="26">08:00:00</option>
                <option value="27">09:00:00</option>
                <option value="28">10:00:00</option>
                <option value="29">11:00:00</option>
                <option value="30">12:00:00</option>
                <option value="31">13:00:00</option>
                <option value="32">14:00:00</option>
                <option value="33">15:00:00</option>
                <option value="34">16:00:00</option>
                <option value="35">17:00:00</option>
                <option value="36">18:00:00</option>
            </select><br>
            <label class="form-label">Nome:</label> 
            <input class="form-control" type="text" name="solicitante" id="solicitante" value="<?php echo $events['professor_desc']; ?>"><br>
            <label class="form-label">Unidade:</label> 
            <input class="form-control" type="text" name="title" id="title" value="<?php echo $events['title']; ?>"><br>
            <label class="form-label">Observações:</label> 
            <input class="form-control" type="text" name="description" id="description" value="<?php echo $events['observacao']; ?>"><br>
            <input class="btn btn-outline-primary" type="submit" value="Confirmar Consulta">
        </form>
    <?php } ?>
</div>
<?php include(DIRREQ . "sala-reuniao/libs/html/footer.php"); ?>