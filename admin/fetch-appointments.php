<?php
require('connection.php');
session_start();

if (!isset($_SESSION['logged_in'])) {
    echo json_encode(["status" => "error", "message" => "Please log in to view appointments"]);
    exit();
}

if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $stmt = $conn->prepare("SELECT name, doctor, time FROM apt_details WHERE date = ?");
    $stmt->bind_param("s", $date);
    $stmt->execute();
    $result = $stmt->get_result();

    $appointments = [];
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }

    echo json_encode(["status" => "success", "appointments" => $appointments]);
} else {
    echo json_encode(["status" => "error", "message" => "Date not provided"]);
}
?>
