<?php 
include_once("connection.php");
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $email = validate($_POST['email']);

    $pass = validate($_POST['password']);

    if (empty($email)) {

        
        echo "<script> 
         alert('Email is required');
        </script> ";

        exit();

    } else if(empty($pass)){

        echo "<script> 
        alert('Password is required');
       </script> ";

        exit();

    }else{

        $sql = "SELECT * FROM admin_info WHERE email='$email' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['full_name'] = $row['full_name'];

                $_SESSION['id'] = $row['id'];

                header("Location:index.php");

                exit();

            }else{

                echo "<script> 
                alert('Email or password not registered.');
               </script> ";
        

            }

        }else{

           
            echo "<script> 
            alert('Incorrect username or password');
           </script> ";
    

            exit();

        }

    }

}