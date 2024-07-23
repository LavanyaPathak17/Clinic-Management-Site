<?php
require('./admin/connection.php');
session_start();

if (isset($_POST['login'])) {
    $query = "SELECT * FROM registered_users WHERE email = '$_POST[email_username]' OR username = '$_POST[email_username]' ";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);

            if ($result_fetch['is_verified'] == 1) {
                if (password_verify($_POST['password'], $result_fetch['password'])) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['username'] = $result_fetch['username'];
                    header("location: task1.php");
                } else {
                    echo "<script> 
                        alert('Incorrect Password');
                        window.location.href = 'task1.php';
                        </script>";
                }
            } else {
                echo "<script> 
                    alert('Email not verified');
                    window.location.href = 'task1.php';
                    </script>";
            }
        } else {
            echo "<script> 
                alert('Email or Username not registered');
                window.location.href = 'task1.php';
                </script>";
        }
    } else {
        echo "<script> 
            alert('Cannot Run Query');
            window.location.href = 'task1.php';
            </script>";
    }
}
?>
