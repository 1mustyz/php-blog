<?php
    include("../includes/dbh.inc.php");
    session_start();

    class Model extends Connect{
        
        protected function createUser($firstName,$lastName,$email,$phone,$address,$photo,$password){
            $myConn = $this->conn();
            
            $sql = "SELECT * FROM users WHERE email='$email';";
            $result = $myConn->query($sql);

            if($result->num_rows > 0){
                return array(
                    'status'=>0,
                    'msg'=>'user with the email already exist'
                );
            }
            else{

                $stmt =  $myConn->prepare("INSERT INTO users (`first_name`,`last_name`,`email`,`phone`,`address`,`photo`,`password`) VALUES (?,?,?,?,?,?,?);");
                $stmt->bind_param("sssssss", $firstName,$lastName,$email,$phone,$address,$photo,$password);
                $stmt->execute();
                return array(
                    'status'=>1,
                    'msg'=>'user registered successfull'
                );
            }    
        }

        protected function loginUser($email,$password) {

            $myConn = $this->conn();
            $dbPassword = '';
            $data = '';

            $sql = "SELECT * FROM users WHERE email='$email';";
            $result = $myConn->query($sql);

            if($result->num_rows <= 0){
                return array(
                    'status'=>0,
                    'msg'=>'no email with the user found'
                );
            }
            else{
                while($row = $result->fetch_assoc()){
                    $dbPassword=$row['password'];
                    $data=$row['id'];
                
                 }
                if ($password == $dbPassword) {
                   $_SESSION['user'] = $data;
                    return array(
                        'status'=>1,
                        'msg'=>'login successfull'
                    );
                }
                return array('msg'=>'wrong password');
            }    
        }


        protected function getSingleUser($userId){
            $myConn = $this->conn();

            $data = array();

            $sql = "SELECT `first_name`,`last_name`,`email`,`phone`,`address`,`photo` FROM users WHERE id = '$userId'";
            $result =  $myConn->query($sql);

          
            if(($userId !== 0)){
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                       $data[]=$row;
                    }
                    return $data;
    
                }
                else{
                    $data[] = array(
                        'status'=>0,
                        'msg' => 'no user yet'
                    );
                    return $data;
                }
            }else{
                $data[] = array(
                    'status'=>0,
                    'msg' => 'no user yet'
                );
                return $data;
            }

           

        }

        
        protected function uploadPhoto($userId,$photo){
            $myConn = $this->conn();

            $sql = "UPDATE `users` SET photo='$photo' WHERE id='$userId'";

            if ($myConn->query($sql) === TRUE) {
            return array(
                'status'=>1,
                'msg' => 'upload successful'
            );
            } else {
            return array(
                'status'=>0,
                'msg' => 'updating error'
            );
            }

        }


        protected function updateUser($firstName,$lastName,$email,$phone,$address,$userId){
            $myConn = $this->conn();
            
            $data;
            $newFirstName;
            $newLastName;
            $newEmail;
            $newPhone;
            $newAddress;

            $sql = "SELECT * FROM users WHERE id='$userId';";
            $result = $myConn->query($sql);

            if($result->num_rows > 0){

                while($row = $result->fetch_assoc()){
                    $data[]=$row;
                 }
                
            }

            if(empty($firstName)){
                $newFirstName = $data[0]['first_name'];
            }else{
                $newFirstName = $firstName;
            }

            if(empty($lastName)){
                $newLastName = $data[0]['last_name'];
            }else{
                $newLastName = $lastName;
            }

            if(empty($email)){
                $newEmail = $data[0]['email'];
            }else{
                $newEmail = $email;
            }

            if(empty($phone)){
                $newPhone = $data[0]['phone'];
            }else{
                $newPhone = $phone;
            }

            if(empty($address)){
                $newAddress = $data[0]['address'];
            }else{
                $newAddress = $address;
            }

            
            $sql = "UPDATE `users` SET first_name='$newFirstName',
                                        last_name='$newLastName', 
                                        email='$newEmail', phone='$newPhone', 
                                        `address`='$newAddress' 
                                        WHERE id='$userId'";

            if ($myConn->query($sql) === TRUE) {
            return array(
                'status'=>1,
                'msg' => 'update successful'
            );
            } else {
            return array(
                'status'=>0,
                'msg' => 'updating error'
            );
            }
               
             
        }
       
    }

//     $conn = new Model();
//   var_dump($conn->updateUser('hadiza','','adiza@gmail.com','','bank road',6));
// $conin = new Model();
// $conin->addMedicine('olu','jos','emzor','pcs','100','400','5');

?>