<?php

$conn = mysqli_connect("localhost", "root", "", "network-analyzer");

if ($conn) {
    echo "Database Connected Successfully";
} else {
    echo "Connection Failed";
}

?>