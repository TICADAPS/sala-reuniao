<?php
#Caminhos absolutos
$dirInt="";
define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$dirInt}");
$bar=(substr($_SERVER['DOCUMENT_ROOT'],-1)=='/')?"":"/";
define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$bar}{$dirInt}");

#Banco de Dados
define('HOST','localhost');
define('DB','u226895969_sgreserva');
define('USER','root');
define('PASS','Senha10adaps');

#Incluir arquivos
include(DIRREQ.'sala-reuniao/vendor/autoload.php');