<?php

require 'ManejadorBD.php';

$id = $_POST['id'];
$cantidad = $_POST['cantidad'];
$fecha = $_POST['fecha'];
$boletos = $_POST['boletos'];
$usuario = $_POST['usuario'];

$m = new ManejadorBD();
$result = $m->buy($id,$cantidad,$fecha,$boletos,$usuario);

echo json_encode($result);

?>