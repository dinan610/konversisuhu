<?php
$conn = mysqli_connect("localhost", "root", "", "db_suhu");
if (!$conn) { die("Database mokat: " . mysqli_connect_error()); }
?>