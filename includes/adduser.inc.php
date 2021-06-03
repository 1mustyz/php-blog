<?php
include("../classes/controller.class.php");

// var_dump($_POST);

// echo $_POST['manufacturer_name'];

// if(isset($_POST["add_manufacturer"])){
//     echo "hello";

    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $photo = 'my photo';
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];



   
    // validation
    if(empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($address) || empty($password) || empty($confirmPassword)){
        print_r(json_encode(array(
            'status'=>0,
            'msg'=>'pls fill all the filled'
        )));
        exit();
    }
    elseif($password !== $confirmPassword){
        print_r(json_encode(array('msg'=>'your password does not match')));
    }else{
        
                $newUser = new Control();
                //parse registration message to script file
                 print_r(json_encode($newUser->createUser($firstName,$lastName,$email,$phone,$address,$photo,$password)));
             // }

    }
      
?>