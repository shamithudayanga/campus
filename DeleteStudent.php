<?php
include "connection.php";
// echo("Done");

$nic = $_GET["id"];

Database::iud("DELETE FROM `student`  WHERE `nic` ='".$nic."'");

echo("Succes");
?>