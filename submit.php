<?php
$host = "sql207.infinityfree.com";
$user = "if0_41772986";
$pass = "Meiry0287";
$db   = "if0_41772986_formdata";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name  = $_POST['name'];
$email = $_POST['email'];

$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
$conn->query($sql);
$conn->close();

echo "Data saved successfully!";
?>
