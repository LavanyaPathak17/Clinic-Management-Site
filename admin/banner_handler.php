<?php 
require('connection.php'); 

if(isset($_POST['navigate'])) {

    $heading = $_POST['heading'];
    $content = $_POST['content'];
    $file_name = $_FILES['file']['name'];
    $tempname = $_FILES['file']['tmp_name'];
    $folder = 'banner_images/'.$file_name;

    $query =   "INSERT INTO `banner_tbl`(`heading`, `content`, `image`) VALUES ('$heading','$content','$file_name')";
    $result = mysqli_query($conn,$query);

    if ($result && move_uploaded_file($tempname,$folder)) {
        echo "<script> 
        alert('Entry added into database and file uploaded successfully');
        window.location.href = 'banners.php';
        </script>";
    }

    else {
        echo "<script> 
            alert('Entry couldn't be added , try again');
            window.location.href = 'banners.php';
            </script>";
    }
} 

if(isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Delete the entry
    $query = "DELETE FROM banner_tbl WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    if ($result) {
        echo "<script>alert('Entry deleted successfully'); window.location.href = 'banner-list.php';</script>";
    } else {
        echo "<script>alert('Error deleting entry'); window.location.href = 'banner-list.php';</script>";
    }
}

if(isset($_POST['update'])) {
    $user_id = $_POST['id']; 
  $heading = $_POST['heading'];
  $content = $_POST['content'];
  $new_image = $_FILES['image']['name'];
  $old_image = $_POST['old_image'];

  if($new_image!= '') {
     $update_filename = $new_image;

     if(file_exists("banner_images/".$_FILES['image']['name'])) {
        $filename = $_FILES['image']['name'];
        echo "<script> 
            alert('Image already exist');
            window.location.href = 'update-form.php';
            </script>";
     }
  }

  else {
    $update_filename = $old_image;
  }

  $update_query = "UPDATE banner_tbl SET heading= '$heading', content = '$content', image='$update_filename' WHERE id='$user_id' ";
  $result = mysqli_query($conn,$update_query);

  if($result) {

    if($_FILES['image']['name'] !=''){
        move_uploaded_file($_FILES["image"]["tmp_name"],"banner_images/".$_FILES['image']['name']);
        unlink("banner_images/".$old_image); // to delete the old image
    }
    echo "<script> 
            alert('Entry Updated Sucessfully');
            window.location.href = 'banner-list.php';
            </script>";
  }

  else {
    echo "<script> 
            alert('Entry couldn't be updated, try again');
            window.location.href = 'update-form.php';
            </script>";
  }
}



