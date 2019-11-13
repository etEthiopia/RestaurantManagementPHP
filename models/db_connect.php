<?php
$server ="localhost";
$user ="root";
$pass ="";
$db ="restaurant";

$conn = mysqli_connect($server, $user, $pass, $db);
mysqli_set_charset($conn,"utf8");
if (!$conn) {
die("Connectivity Problem:" .mysqli_connect_error());
}

?>