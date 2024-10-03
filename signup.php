<?php
include 'config.php'; // Database connection

// Initialize variables
$username = $password = $fullname = $email = "";
$signup_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form input
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];

    // SQL query to insert the new user
    $sql = "INSERT INTO users (username, password, fullname, email) VALUES ('$username', '$password', '$fullname', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New user registered successfully!";
    } else {
        $signup_error = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up Page</title>
</head>
<body>
    <h2>Sign Up</h2>
    <form action="signup.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="fullname" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Sign Up</button>
    </form>
    <p><?php if (!empty($signup_error)) echo $signup_error; ?></p>
</body>
</html>
