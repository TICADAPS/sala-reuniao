<?php session_start(); ?>
<?php include("../../config/config.php"); ?>
<?php include(DIRREQ . "sala-reuniao/libs/html/header.php"); ?>
<?php @$date = new \DateTime($_GET['date'], new \DateTimeZone('America/Sao_Paulo')); ?>
<div class="container">
    <?php 
    if (isset($_SESSION['reservado'])) {
        echo '<div class="alert alert-warning"><strong>Alerta!</strong> ' . $_SESSION['reservado'] . '<a href="../index.php" class="alert-link"> Deseja Voltar? clique aqui... </a></div>';
        unset($_SESSION['reservado']);
    } elseif (isset($_SESSION['reserva'])) {
        echo '<div class="alert alert-success"><strong>Sucesso!</strong> ' . $_SESSION['reserva'] . '<a href="../index.php" class="alert-link"> Deseja Voltar? clique aqui... </a></div>';
        unset($_SESSION['reserva']);
    } else {
    ?>
        <form name="formAdd" id="formAdd" method="post" action="<?php echo DIRPAGE . 'sala-reuniao/controller/ControllerAdd.php'; ?>">
            <div class="row mt-5 mb-4">
                <div class="col-md-4">
                    <label class="form-check-label">Data:</label>
                    <input class="form-control" type="date" name="date" id="date" value="<?php echo $date->format("Y-m-d"); ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-check-label">Período:</label>
                    <select class="form-select" name="time" id="time">
                        <option value="">Selecione...</option>
                        <option value="26">08h00</option>
                        <option value="27">09h00</option>
                        <option value="28">10h00</option>
                        <option value="29">11h00</option>
                        <option value="30">12h00</option>
                        <option value="31">13h00</option>
                        <option value="32">14h00</option>
                        <option value="33">15h00</option>
                        <option value="34">16h00</option>
                        <option value="35">17h00</option>
                        <option value="36">18h00</option>
                    </select>
                </div>
            </div>
            <div class="row mt-5 mb-4">
                <div class="col-md-4">
                    <label class="form-check-label">Unidade:</label>
                    <input class="form-control" type="text" name="title" id="title">
                </div>
                <div class="col-md-4">
                    <label class="form-check-label">Qual sala de reunião deseja reservar?</label>
                    <select class="form-select" name="sala" id="sala">
                        <option value="">Selecione...</option>
                        <option value="10"> Sala Leste Presidência</option>
                        <option value="11"> Sala Oeste DIOP/DAIS</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-check-label">Nome do solicitante:</label>
                    <input class="form-control" type="text" name="solicitante" id="solicitante">
                </div>
            </div>
            <div class="row mt-5 mb-4">
                <div class="col-md-12">
                    <label class="form-check-label">Observações:</label> <textarea class="form-control" type="text" rows="5" name="description" id="description"></textarea>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" value="Reservar Sala de Reunião">
        </form>
    <?php } ?>
</div>

<?php include(DIRREQ . "sala-reuniao/libs/html/footer.php"); ?>