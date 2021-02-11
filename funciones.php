<?php

require 'ManejadorBD.php';

$m = new ManejadorBD();
$result = $m->showAll();

echo json_encode($result);

?>