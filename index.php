<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include_once("db.php");

if (!isset($conn)) {
    die("Connection variable not found.");
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Network Analyzer</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<meta http-equiv="refresh" content="5">

<link rel="stylesheet" href="/network-analyzer/style.css?v=2">

</head>

<body>

<a href="logout.php" style="
float:right;
padding:8px 12px;
background:red;
color:white;
text-decoration:none;
border-radius:5px;
font-weight:bold;
">
Logout
</a>

<a href="test_results.php">
<button>View Test Results</button>
</a>
<head>
    <title>Network Analyzer</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta http-equiv="refresh" content="5">
    <link rel="stylesheet" href="/network-analyzer/style.css?v=2">


    
</head>
<body>
<body>


    <iframe src="ping.php" style="display:none;"></iframe>
    <?php
$latest = $conn->query("SELECT * FROM metrics ORDER BY id DESC LIMIT 1");
$row = $latest->fetch_assoc();
?>

<div class="dashboard">
    <div class="card latency">
        <h3>Latency</h3>
        <p><?php echo $row['latency'] ?? 0; ?> ms</p>
    </div>

    <div class="card throughput">
        <h3>Throughput</h3>
        <p><?php echo $row['throughput'] ?? 0; ?> Mbps</p>
    </div>

    <div class="card packet">
        <h3>Packet Loss</h3>
        <p><?php echo $row['packet_loss'] ?? 0; ?> %</p>
    </div>

    <div class="card signal">
        <h3>Signal Strength</h3>
        <p><?php echo $row['signal_strength'] ?? 0; ?> dBm</p>
    </div>
    <div class="card jitter">
    <h3>Jitter</h3>
    <p><?php echo $row['jitter'] ?? 0; ?> ms</p>
</div>
<div class="card bandwidth">
    <h3>Bandwidth Utilization</h3>
    <p><?php echo $row['bandwidth_utilization'] ?? 0; ?> %</p>
</div>
</div>


<h2>Network Performance Data</h2>
<h2>Network Alerts</h2>

<h2>Network Status</h2>

<?php
if ($row) {

    if ($row['latency'] > 100) {
        echo "<div class='alert red'>⚠️ High Latency Detected</div>";
    }

    if ($row['packet_loss'] > 3) {
        echo "<div class='alert red'>⚠️ High Packet Loss</div>";
    }

    if ($row['signal_strength'] < -70) {
        echo "<div class='alert orange'>⚠️ Weak Signal</div>";
    }
    if ($row['bandwidth_utilization'] > 80) {
    echo "<div class='alert orange'>⚠️ High Bandwidth Utilization</div>";
}

    if (
    $row['latency'] <= 100 &&
    $row['packet_loss'] <= 3 &&
    $row['signal_strength'] >= -70 &&
    $row['bandwidth_utilization'] <= 80
) {
        echo "<div class='alert green'>✅ Network Normal</div>";
    }
}
?>



<table border="1">
<tr>
    <th>Latency</th>
<th>Throughput</th>
<th>Packet Loss</th>
<th>Signal Strength</th>
<th>Jitter</th>
<th>Bandwidth Utilization</th>
<th>Time</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM metrics ORDER BY id DESC");

while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['latency']}</td>
        <td>{$row['throughput']}</td>
        <td>{$row['packet_loss']}</td>
        <td>{$row['signal_strength']}</td>
        <td>{$row['jitter']}</td>
        <td>{$row['bandwidth_utilization']}</td>
        <td>{$row['created_at']}</td>
    </tr>";
}
?>
</table>

<h3>Latency Graph</h3>
<canvas id="myChart"></canvas>

<?php
$data = $conn->query("SELECT * FROM metrics ORDER BY id ASC");

$latency = [];
$throughput = [];
$packet_loss = [];
$signal = [];
$jitter = [];
$bandwidth = [];
$time = [];

while($row = $data->fetch_assoc()) {
    $latency[] = $row['latency'];
    $throughput[] = $row['throughput'];
    $packet_loss[] = $row['packet_loss'];
    $signal[] = $row['signal_strength'];
    $jitter[] = $row['jitter'];
    $bandwidth[] = $row['bandwidth_utilization'];
    $time[] = $row['created_at'];
}
?>

<script>
const labels = <?php echo json_encode($time); ?>;

const data = {
    labels: labels,
    datasets: [
        {
            label: 'Latency (ms)',
            data: <?php echo json_encode($latency); ?>,
            borderWidth: 2
        },
        {
            label: 'Throughput (Mbps)',
            data: <?php echo json_encode($throughput); ?>,
            borderWidth: 2
        },
        {
            label: 'Packet Loss (%)',
            data: <?php echo json_encode($packet_loss); ?>,
            borderWidth: 2
        },
        {
            label: 'Signal Strength (dBm)',
            data: <?php echo json_encode($signal); ?>,
            borderWidth: 2
        },
        {
            label: 'Jitter (ms)',
            data: <?php echo json_encode($jitter); ?>,
            borderWidth: 2
},
{
           label: 'Bandwidth Utilization (%)',
           data: <?php echo json_encode($bandwidth); ?>,
           borderWidth: 2
}
    ]

};

const config = {
    type: 'line',
    data: data,
};

new Chart(
    document.getElementById('myChart'),
    config
);
</script>
<script>
setInterval(function() {
    fetch('ping.php');
}, 5000);
</script>



</body>
</html>
