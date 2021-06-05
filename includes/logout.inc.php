<?php
    include("../classes/controller.class.php");
    
    
if(isset($_SESSION['user'])){
    if(session_destroy()){
        print_r(json_encode(array(
            'status'=> 1,
            'msg'=>'logout successfull'
        )));
    }else{
        print_r(json_encode(array(
            'status' => 0,
            'msg'=>'fail to logout'
        )));

    }
    
}else{
    echo 'no user yet';
}

?>