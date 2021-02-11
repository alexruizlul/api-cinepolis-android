<?php

require 'ManejadorBD.php';

$m = new ManejadorBD();
$result = $m->showTickets();

echo json_encode($result);

?>