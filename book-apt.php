<?php
require('./admin/connection.php');
session_start();
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $subject, $message) {
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/Exception.php");
    require("PHPMailer/SMTP.php");


    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'lavanyapathak50119@gmail.com'; // Replace with your SMTP username
        $mail->Password = 'vuajllajzbycqdcb'; // Replace with your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('your-email@gmail.com', 'Your Name'); // Replace with your "From" email and name
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if (!isset($_SESSION['logged_in'])) {
    echo "<script>
        alert('Please log in to book an appointment');
        window.location.href = 'task1.php';
    </script>";
    exit();
}

$name = $_GET['name'];
$email = $_GET['email'];
$mobile = $_GET['mobile'];
$category = $_GET['category'];
$doctor = $_GET['doctor'];
$date = $_GET['date'];
$time = $_GET['time'];
$ack_no = uniqid();

//Validate time slots
$valid_times = ["09:00", "10:00", "11:00", "12:00", "14:00", "15:00", "16:00", "17:00"];
if (!in_array($time, $valid_times)) {
    echo "<script>
        alert('Invalid time slot selected');
        window.location.href = 'task1.php';
    </script>";
    exit();
}

// Check for existing appointments
$stmt = $conn->prepare("SELECT * FROM apt_details WHERE doctor = ? AND date = ? AND time = ?");
$stmt->bind_param("sss", $doctor, $date, $time);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<script>
        alert('Doctor is already booked for this time slot');
        window.location.href = 'task1.php';
    </script>";
    exit();
}

// Insert appointment into the database
$stmt = $conn->prepare("INSERT INTO apt_details (name, email, mobile_no, category, doctor, date, time, ack_no) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $name, $email, $mobile, $category, $doctor, $date, $time, $ack_no);
if ($stmt->execute()) {
    // Send confirmation email
    $subject = "Appointment Confirmation";
    $message = "Dear $name,<br><br>
                Your appointment for <strong>$category</strong> with <strong>$doctor</strong> on <strong>$date</strong> at <strong>$time</strong> has been confirmed.<br>
                Your acknowledgment number is <strong>$ack_no</strong>.<br><br>
                Thank you for choosing us<br>
                Telehealth Doctor Team.";
    if (sendMail($email, $subject, $message)) {
        echo "<script>
            alert('Appointment booked successfully');
            window.location.href = 'task1.php';
        </script>";
    } else {
        echo "<script>
            alert('Appointment booked, but failed to send confirmation email');
            window.location.href = 'task1.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Error booking appointment. Please try again later.');
        window.location.href = 'task1.php';
    </script>";
}
?>
