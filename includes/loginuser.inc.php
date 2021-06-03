<?php
include("../classes/controller.class.php");

    
    $email = $_POST["email"];
    $password = $_POST["password"];



    //validation
    if(empty($email) || empty($password)){
        print_r(json_encode(array(
            'status'=>0,
            'msg'=>'pls fill the both filled for login'
        )));
        exit();
    }
    else{
                $loginUser = new Control();
                //parse registration message to script file
                 print_r(json_encode($loginUser->loginUser($email,$password)));
             // }

    }
      
?>