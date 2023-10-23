<?php
$email = $_POST ['email'];
$password = $_POST ['password'];

// Create connection
$con = new mysqli("localhost","root","","test");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    $stmt = $con ->prepare("select * from datauser where email = ?");
    $stmt-> bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data['password'] === $password){
            header("Location: home.html");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }

    $stmt->close();
    $con->close();
}
?>




