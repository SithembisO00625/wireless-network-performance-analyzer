<?php
session_start();
include 'db.php';

$error = "";

if (isset($_POST['login'])) {

    // Remove extra spaces
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check for empty fields
    if (empty($username) || empty($password)) {

        $error = "Please enter both username and password.";

    } else {

        // Use Prepared Statement to prevent SQL Injection
        $stmt = $conn->prepare("SELECT * FROM users_1 WHERE username = ? AND password = ?");

        if ($stmt) {

            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows == 1) {

                // Create Session
                $_SESSION['username'] = $username;

                header("Location: index.php");
                exit();

            } else {

                $error = "Invalid Username or Password.";

            }

            $stmt->close();

        } else {

            $error = "System error. Please try again.";

        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

<h2>Wireless Network Performance Analyzer</h2>

<form method="POST">

    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="login">Login</button>

</form>

</body>
</html>