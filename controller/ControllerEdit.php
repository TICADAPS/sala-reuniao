<?php
include ("../config/config.php");
$objEvents=new \Classes\ClassEvents();
$date=filter_input(INPUT_POST,'date',FILTER_DEFAULT);
$time=filter_input(INPUT_POST,'time',FILTER_DEFAULT);
$id=filter_input(INPUT_POST,'id',FILTER_DEFAULT);
$title=filter_input(INPUT_POST,'title',FILTER_DEFAULT);
$solicitante=filter_input(INPUT_POST,'solicitante',FILTER_DEFAULT);
$description=filter_input(INPUT_POST,'description',FILTER_DEFAULT);
//$start=new \DateTime($date.' '.$time, new \DateTimeZone('America/Sao_Paulo'));
//var_dump($date,$time,$id,$title,$description,$solicitante);

$objEvents->updateEvent($id, $title, $description, $solicitante,$date,$time);




