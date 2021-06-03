<?php
include("model.class.php");

class Control extends Model{

    public function createUser($firstName,$lastName,$email,$phone,$address,$photo,$password) {
        return Model::createUser($firstName,$lastName,$email,$phone,$address,$photo,$password);
    }

    public function loginUser($email,$password){
        return Model::loginUser($email,$password);
    }

    public function getSingleUser($userId){
        return Model::getSingleUser($userId);
    }

    public function uploadPhoto($userId, $photo){
        return Model::uploadPhoto($userId, $photo);
    }
}

// $con = new Control();
// var_dump($con->createUser('hadiza','yusuf','f@gmail.com','098373773','jambutu','mypic','1234'));

// var_dump($con->viewStock());
?>