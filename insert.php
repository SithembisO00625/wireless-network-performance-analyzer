<?php
include 'db.php';

// Sample values (replace these with your actual values if they come from another file)
$latency = 25;
$throughput = 40;
$packet_loss = 2;
$signal_strength = -65;
$jitter = 5;

// Calculate Bandwidth Utilization
$maximumBandwidth = 100;
$bandwidth_utilization = round(($throughput / $maximumBandwidth) * 100, 2);

$sql = "INSERT INTO metrics
(latency, throughput, packet_loss, signal_strength, jitter, bandwidth_utilization)
VALUES
('$latency',
 '$throughput',
 '$packet_loss',
 '$signal_strength',
 '$jitter',
 '$bandwidth_utilization')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $conn->error;
}
?>
