<?php

require_once('../config.php');
require_once('../../libs/Database.php');

$mysql_options = [
    'host' => MYSQL_HOST,
    'database' => MYSQL_DATABASE,
    'username' => MYSQL_USERNAME,
    'password' => MYSQL_PASSWORD,
];


$db = new Database($mysql_options);
$results = $db->execute_query("SELECT r.id,r.disciplina_desc as title,concat(r.dia,' ',p.periodoinicial) as 'start',
concat(r.dia,' ', p.periodofinal) as 'end'
FROM reserva r INNER JOIN periodo p on r.periodo_id = p.id;");

echo json_encode($results->results, 128);
