<?php

require 'ManejadorBD.php';

$id = $_POST['id'];

$m = new ManejadorBD();
$result = $m->hours($id);

echo json_encode($result);

?>