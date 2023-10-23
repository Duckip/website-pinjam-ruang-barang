<?php
$Perangkat = $_POST['Perangkat'];
$Mulai = $_POST['Mulai'];
$Berakhir = $_POST['Berakhir'];
$Alasan = $_POST['Alasan'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO pinjamperangkat (Perangkat, Mulai, Berakhir, Alasan) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $Perangkat, $Mulai, $Berakhir, $Alasan);
    
    // Execute the statement
    $execval = $stmt->execute();

    // Check for errors
    if ($execval === false) {
        echo "Error: " . $stmt->error;
    } else {
        header("Location: barang.html");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
