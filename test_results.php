<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>System Test Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>System Testing Results</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Test Case</th>
        <th>Expected Result</th>
        <th>Actual Result</th>
        <th>Status</th>
    </tr>

    <tr>
        <td>Database Connection</td>
        <td>Connect Successfully</td>
        <td>Connected</td>
        <td>PASS</td>
    </tr>

    <tr>
        <td>Data Collection</td>
        <td>Collect Metrics</td>
        <td>Metrics Recorded</td>
        <td>PASS</td>
    </tr>

    <tr>
        <td>Data Storage</td>
        <td>Store in Database</td>
        <td>Records Saved</td>
        <td>PASS</td>
    </tr>

    <tr>
        <td>Graph Generation</td>
        <td>Display Graph</td>
        <td>Graph Displayed</td>
        <td>PASS</td>
    </tr>

    <tr>
        <td>Dashboard Display</td>
        <td>Show Metrics</td>
        <td>Metrics Visible</td>
        <td>PASS</td>
    </tr>
</table>

</body>
</html>