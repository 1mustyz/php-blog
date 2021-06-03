<?php
include("../classes/controller.class.php");

// var_dump($_POST);

// echo $_POST['manufacturer_name'];

// if(isset($_POST["add_manufacturer"])){
//     echo "hello";
 


    $photo = $_FILES['image']['name'];
    $userId = $_SESSION['user'];
  	// Get text
  	// $image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
      $target = "images/".basename($photo);
      
      if (move_uploaded_file($_FILES['image']['tmp_name'], $photo)) {
        echo $msg = "Image uploaded successfully";

        $newUser = new Control();
                //parse registration message to script file
                print_r(json_encode($newUser->uploadPhoto($userId,$photo)));
                
         
    }else{
        echo $msg = "Failed to upload image";
        // echo $target;
    }
    
      
?>