<?php 
require('connection.php');

if(isset($_POST['navigate'])) {

    $name = $_POST['name'];
    $link = $_POST['link'];

     $sql = "INSERT INTO `navigation_tbl`(`name`, `link`) VALUES ('$name','$link')";
    $result = mysqli_query($conn,$sql);

    if($result) {
        echo "<script> 
        alert('Entry added into database');
        window.location.href = 'nav.php';
        </script>";
    }

    else {
        echo "<script> 
            alert('Entry couldn't be added , try again');
            window.location.href = 'nav.php';
            </script>";
    }
} 

if(isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Delete the entry
    $query = "DELETE FROM navigation_tbl WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    if ($result) {
        echo "<script>alert('Entry deleted successfully'); window.location.href = 'nav.php';</script>";
    } else {
        echo "<script>alert('Error deleting entry'); window.location.href = 'nav-list.php';</script>";
    }
}


if(isset($_POST['update'])) {
   $user_id = $_POST['id']; 
   $name = $_POST['name'];
   $link = $_POST['link'];

   $sql = "UPDATE `navigation_tbl` SET `name`='$name',`link`='$link' WHERE id = '$user_id' ";
   $result = mysqli_query($conn,$sql);

   if($result) {
    echo "<script> 
    alert('Entry Updated Sucessfully');
    window.location.href = 'nav-list.php';
    </script>";
   }

   else {
    echo "<script> 
    alert('Entry couldn't be updated, try again');
    window.location.href = 'nav-update-form.php';
    </script>";
   }

}