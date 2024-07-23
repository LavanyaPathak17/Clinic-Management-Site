<?php
require('./admin/connection.php');
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $v_code) {
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/Exception.php");
    require("PHPMailer/SMTP.php");

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'lavanyapathak50119@gmail.com';
        $mail->Password = 'vuajllajzbycqdcb';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('lavanyapathak50119@gmail.com', 'Lavanya Pathak');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Email Verification from Lavanya Pathak';
        $mail->Body = "Thanks for registration!
            Click the link below to verify the email address
            <a href='http://localhost/project/verification.php?email=$email&v_code=$v_code'>Verify</a>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if (isset($_POST['register'])) {
    $user_exist_query = "SELECT * FROM registered_users WHERE username = '$_POST[username]' OR email = '$_POST[email]'";
    $result = mysqli_query($conn, $user_exist_query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $result_fetch = mysqli_fetch_assoc($result);

            if ($result_fetch['username'] == $_POST['username']) {
                echo "<script> 
                    alert('$result_fetch[username] - Username already taken');
                    window.location.href = 'task1.php';
                    </script>";
            } else {
                echo "<script> 
                    alert('$result_fetch[email] - E-mail already taken');
                    window.location.href = 'task1.php';
                    </script>";
            }
        } else {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $v_code = bin2hex(random_bytes(16));

            $sql = "INSERT INTO registered_users(full_name, username, email, password, verification_code, is_verified) VALUES ('$_POST[fullname]', '$_POST[username]', '$_POST[email]', '$password', '$v_code', '0')";
            if (mysqli_query($conn, $sql) && sendMail($_POST['email'], $v_code)) {
                echo "<script> 
                    alert('Registration Successful');
                    window.location.href = 'task1.php';
                    </script>";
            } else {
                echo "<script> 
                    alert('Registration Successful, but email verification failed. Please try again later.');
                    window.location.href = 'task1.php';
                    </script>";
            }
        }
    } else {
        echo "<script> 
            alert('Cannot Run Query');
            window.location.href = 'task1.php';
            </script>";
    }
}
?>
