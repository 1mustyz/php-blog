<?php
    include("../classes/controller.class.php");

    // echo $_SESSION['user'];
    
    if(isset($_SESSION['user'])){

        $singleUser = new Control();
        //parse registration message to script file
         print_r(json_encode($singleUser->getSingleUser($_SESSION['user'])));
    }

?>