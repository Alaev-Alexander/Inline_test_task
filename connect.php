<?php

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "inline_test_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>