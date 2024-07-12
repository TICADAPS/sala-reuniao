<?php
include("../config/config.php");

$objEvents = new \Classes\ClassEvents();

$date = filter_input(INPUT_POST, 'date', FILTER_DEFAULT);
$time = filter_input(INPUT_POST, 'time', FILTER_DEFAULT);
$title = filter_input(INPUT_POST, 'title', FILTER_DEFAULT);
$description = filter_input(INPUT_POST, 'description', FILTER_DEFAULT);
//$horasAtendimento = filter_input(INPUT_POST, 'horasAtendimento', FILTER_DEFAULT);
$sala = filter_input(INPUT_POST, 'sala', FILTER_DEFAULT);
$solicitante = filter_input(INPUT_POST, 'solicitante', FILTER_DEFAULT);
$status = 1;
//$start = new \DateTime($date . ' ' . $time, new \DateTimeZone('America/Sao_Paulo'));

//$horainicio = "$time";
//$horafim = "$horasAtendimento:00:00";
//$horafinal = (somaHora($horainicio, $horafim));

var_dump($sala,$time,$date,$solicitante,$title,$status,$description);
/*
function somaHora($hora1, $hora2)
{

    $h1 = explode(":", $hora1);
    $h2 = explode(":", $hora2);

    $segundo = $h1[2] + $h2[2];
    $minuto  = $h1[1] + $h2[1];
    $horas   = $h1[0] + $h2[0];
    $dia       = 0;

    if ($segundo > 59) {

        $segundodif = $segundo - 60;
        $segundo = $segundodif;
        $minuto = $minuto + 1;
    }

    if ($minuto > 59) {

        $minutodif = $minuto - 60;
        $minuto = $minutodif;
        $horas = $horas + 1;
    }

    if ($horas > 24) {

        $num = 0;

        (int)$num = $horas / 24;
        $horaAtual = (int)$num * 24;
        $horasDif = $horas - $horaAtual;

        $horas = $horasDif;

        for ($i = 1; $i <= (int)$num; $i++) {

            $dia +=  1;
        }
    }

    if (strlen($horas) == 1) {

        $horas = "0" . $horas;
    }

    if (strlen($minuto) == 1) {

        $minuto = "0" . $minuto;
    }

    if (strlen($segundo) == 1) {

        $segundo = "0" . $segundo;
    }

    return  $horas . ":" . $minuto . ":" . $segundo;
}
*/


$objEvents->createEvent(0,$sala,$time,$date,$solicitante,$title,$status,$description);