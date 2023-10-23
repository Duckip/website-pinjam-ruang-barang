<?php
$Ruang = $_POST['Ruang'];
$Tanggal = $_POST['Tanggal'];
$Mulai = $_POST['Mulai'];
$Selesai = $_POST['Selesai'];
$Alasan = $_POST['Alasan'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO pinjamruang (Ruang, Tanggal, Mulai, Selesai, Alasan) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $Ruang, $Tanggal, $Mulai, $Selesai, $Alasan);
    
    // Execute the statement
    $execval = $stmt->execute();

    // Check for errors
    if ($execval === false) {
        echo "Error: " . $stmt->error;
    } else {
        header("Location: ruang.html");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
