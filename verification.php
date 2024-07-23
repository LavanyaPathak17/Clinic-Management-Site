<?php

  require("./admin/connection.php");

  if(isset($_GET['email']) && isset($_GET['v_code'])) {   // we will use get request now , to retrieve the information from the internet 
    // we use POST to put some information on the internet

    $query = "SELECT * FROM `registered_users` WHERE `email` = '$_GET[email]' AND `verification_code` = '$_GET[v_code]'";
    $result = mysqli_query($conn,$query);

    if($result) {
       if(mysqli_num_rows($result)==1)
       {
        $result_fetch = mysqli_fetch_assoc($result);

        if($result_fetch['is_verified']==0) {

            $update = "UPDATE `registered_users` SET `is_verified` = '1' WHERE `email` = '$result_fetch[email]'";

            if(mysqli_query($conn, $update)) {

                echo "
                        <script>
                        alert('Email Verification Successful');
                        window.location.href = 'task1.php';
                        </script>
                        ";
            }

            else {
                echo "
                        <script>
                        alert('Cannot run query');
                        window.location.href = 'task1.php';
                        </script>
                        ";
            }
        }   

        else {
            echo "
            <script>
            alert('Email already verified');
            window.location.href = 'task1.php';
            </script>
            ";
        }
       }

    }

    else {

     echo "
     <script>
     alert('Cannot run query');
     window.location.href = 'task1.php';
     </script>
     ";
    }

  }

?>