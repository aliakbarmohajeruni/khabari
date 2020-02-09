<?php
require_once '../include/Service.php';
$Service = new Service();
$Resutl = $Service->telegramSend();
header("location: ../dashboard/");

?>

