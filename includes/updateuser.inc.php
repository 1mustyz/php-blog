<?php
include("../classes/controller.class.php");


    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $userId = $_SESSION['user'];
   

    $newUser = new Control();
    //parse registration message to script file
     print_r(json_encode($newUser->updateUser($firstName,$lastName,$email,$phone,$address,$userId)));
 // }

   
   
        

    
      
?>