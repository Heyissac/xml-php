<?php
$response = array("exists" => file_exists("assets/xml/archivo.xml"));
header('Content-Type: application/json');
echo json_encode($response);
?>
