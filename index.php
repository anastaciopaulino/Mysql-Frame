<?php

require_once("config.php");

/* Carrega um usuario
$dev = new Usuario();
$dev -> loadById(3);
*/

$lista = Usuario::getList("tb_usuarios");

echo json_encode($lista);

?>