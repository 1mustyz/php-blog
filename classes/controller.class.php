<?php
include("model.class.php");

class Control extends Model{

    public function createUser($firstName,$lastName,$email,$phone,$address,$photo,$password) {
        return Model::createUser($firstName,$lastName,$email,$phone,$address,$photo,$password);
    }

    public function loginUser($email,$password){
        return Model::loginUser($email,$password);
    }

    public function getSingleUser($userId =0){
        return Model::getSingleUser($userId);
    }

    public function uploadPhoto($userId, $photo){
        return Model::uploadPhoto($userId, $photo);
    }

    public function updateUser($firstName,$lastName,$email,$phone,$address,$userId){
        return Model::updateUser($firstName,$lastName,$email,$phone,$address,$userId);
    }
}

// $con = new Control();
// var_dump($con->getSingleUser());

// var_dump($con->viewStock());
?>