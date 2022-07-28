<?php

    require_once "database.php";

    class Admin extends Database{

        public function createUser($first_name, $last_name, $username, $password){

            $sql = "INSERT INTO `users`(`first_name`, `last_name`, `username`, `password`)
            VALUES ('$first_name', '$last_name', '$username', '$password')";

            if($this->conn->query($sql)){
                header("Location: ../views");
                exit;
            }
            else{
                die("Error in creating user ".$this->conn->error);
            }
        }

        public function login($username, $password){

            $sql = "SELECT id, username, `password` FROM `admin` WHERE username = '$username'";
    
            $result = $this->conn->query($sql);
    
            if($result -> num_rows == 1){
                $user_details = $result->fetch_assoc();
    
                if(password_verify($password,$user_details['password'])){
    
                    //create a session
                    session_start();
    
                    $_SESSION['user_id'] = $user_details['id'];
                    $_SESSION['username'] = $user_details['username'];
    
                    header("location: ../admin/dashboard.php");
                    exit;
                }
                else{
                    die("Password is incorrect");
                }
            }
            else{
                die("Username not found");
            }
        }

        public function getProducts(){

            $sql = "SELECT * FROM `tblproduct` WHERE 1";

            if($result = $this->conn->query($sql)){
                return $result;
            }else{
                die("Error".$this->conn->error);
            }
        }   

        public function getProduct($id){

            $sql = "SELECT * FROM `tblproduct` WHERE id = $id";

            if($result = $this->conn->query($sql)){
                return $result->fetch_assoc();
            }else{
                die("Error".$this->conn->error);
            }
        }   

        public function editProduct($id,$product_name, $product_code, $product_image, $price, $tmp_name){

            $sql = "UPDATE `tblproduct` SET `name`='$product_name',`code`='$product_code',`price`='$price' WHERE id = $id";
    
            if($this->conn->query($sql)){
                if($_FILES['photo']['name'] == "") {
                    header("Location: ../admin/dashboard.php");
                    exit;
                    }else{
                        $upload = "UPDATE `tblproduct` SET `image`='../assets/images/$product_image' 
                        WHERE id = $id";
                        if($this->conn->query($upload)){
                            $destination = "../assets/images/$product_image";
        
                            //move the file
                            move_uploaded_file($tmp_name, $destination);
                            header("Location: ../admin/dashboard.php");
                            exit;
                        }
                    }
                    }
                    else{
                         die("Error in creating user ".$this->conn->error);
                     }
                    }

                    public function deleteProduct($id){
                        $sql = "DELETE FROM tblproduct WHERE `id` = $id";
                
                        if($this->conn->query($sql)){
                            header("location: ../admin/dashboard.php");
                        }
                        else{
                            die("Error in deleting data ".$this->conn->error);
                        }
                    }

                    public function displayPurchase(){
                        $sql = "SELECT * FROM `purchased-info` WHERE 1";

                        if($result = $this->conn->query($sql)){
                            return $result;
                        }else{
                            die("Error".$this->conn->error);
                        }
                    }

                    public function viewTransaction($tcode){
                        $sql = "SELECT * FROM `transaction` WHERE transaction_id = '$tcode' ";

                        if($result = $this->conn->query($sql)){
                            // expecting one or more rows
                            while($row = $result->fetch_assoc()){ 
                                $product = $row['product_code'];
                                //echo $product;
                                $sql_product =  "SELECT * FROM `tblproduct` WHERE `code` = '$product' "; 
                                $product_array[] =  $product;                                                  
                            }

                            return $product_array;
                        } else {
                            die("Error retrieving all users: " . $this->conn->error);
                        }
                        
                    }

                    public function viewItem($product_code){
                        $sql = "SELECT * FROM tblproduct WHERE code = '$product_code'";

                        if($result = $this->conn->query($sql)){
                            // expecting one row only
                            return $result->fetch_assoc();
                        } else {
                            die("Error retrieving user: " . $this->conn->error);
                        }
                    }
                    
                
        
    }