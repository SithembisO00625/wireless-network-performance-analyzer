<?php

$conn = mysqli_connect("localhost", "root", "", "network-analyzer");

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

?>
