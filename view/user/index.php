<?php include("../../config/config.php"); ?>
<?php include(DIRREQ."sala-reuniao/libs/html/header.php"); ?>
<style>
    #raio1{
        display: inline;        
        width: 16px;
        height: 16px;
        background-color: #FBFABB;
        border-radius: 50%;
        float: left;
    }
    #raio2{
        display: inline;        
        width: 16px;
        height: 16px;
        background-color: #BFF9B9;
        border-radius: 50%;
        float: left;
    }
    #raio3{
        display: inline;        
        width: 16px;
        height: 16px;
        background-color: #FCC5C5;
        border-radius: 50%;
        float: left;
    }
</style>
<div class="container">
    <div class="mt-4 p-5 bg-light text-white rounded">
        <img src="../img/logoagsus.png" alt="" width="35%">
        <h3 class="text-primary mt-3 text-center">Agendamento de sala de reunião - AgSUS</h3>
    </div>
    <div class="calendarUser"></div>
    <div class="footer mb-5">
        <b>*Legenda:</b>
        <div class="row">
            <div class="col-1">Reservado </div>
            <div class="col-1"><div id="raio1"></div></div>
        </div>       
        <div class="row">
            <div class="col-1">Confirmado </div>
            <div class="col-1"><div id="raio2"></div></div>
        </div>       
        <div class="row">
            <div class="col-1">Cancelado </div>
            <div class="col-1"><div id="raio3"></div></div>
        </div>       
    </div>

</div>

<?php include(DIRREQ."sala-reuniao/libs/html/footer.php"); ?>