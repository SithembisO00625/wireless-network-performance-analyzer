<?php
include 'db.php';

// Target (Google DNS or any site)
$host = "8.8.8.8";

// Run ping command
$output = shell_exec("ping -n 10 $host");

// Extract latency (Average)
if (preg_match('/Average = (\d+)ms/', $output, $matches)) {
    $latency = intval($matches[1]);
} else {
    $latency = 0;
}

// Simulated throughput (Mbps)
$throughput = rand(20,100);

// Calculate Packet Loss
if (preg_match('/Lost = (\d+)/', $output, $loss)) {
    $lost = intval($loss[1]);
    $packet_loss = ($lost / 10) * 100;
} else {
    $packet_loss = 0;
}

// Calculate Jitter
$jitter = 0;

if (
    preg_match('/Minimum = (\d+)ms/', $output, $min) &&
    preg_match('/Maximum = (\d+)ms/', $output, $max)
) {
    $jitter = intval($max[1]) - intval($min[1]);
}

// Simulated Signal Strength
$signal_strength = rand(-80,-40);

// ============================
// Calculate Bandwidth Utilization
// ============================

// Assume a 100 Mbps network
$maximumBandwidth = 100;

$bandwidth_utilization = ($throughput / $maximumBandwidth) * 100;

// Prevent values greater than 100%
if ($bandwidth_utilization > 100) {
    $bandwidth_utilization = 100;
}

$bandwidth_utilization = round($bandwidth_utilization,2);

// Insert into database
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
    echo "Ping: $latency ms recorded";
} else {
    echo "Error: " . $conn->error;
}
?>