<?php

    require_once "database.php";

    class User extends Database{

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

            $sql = "SELECT id, username, `password` FROM users WHERE username = '$username'";
    
            $result = $this->conn->query($sql);
            
    
            if($result -> num_rows == 1){
                $user_details = $result->fetch_assoc();
    
                if(password_verify($password,$user_details['password'])){
    
                    //create a session
                    session_start();
    
                    $_SESSION['user_id'] = $user_details['id'];
                    $_SESSION['username'] = $user_details['username'];
    
                    header("location: ../views/products.php");
                    exit;
                }
                else{
                    "<div class='alert alert-danger text-center fw-bold' role='alert'>Incorrect Username or Password</div>";
                    die("Password is incorrect");
                }
            }
            else{
                die("Username not found");
            }
        }

        public function savePurchase($name,$address,$email,$holder,$number,$date,$transaction_id){
            $sql = "INSERT INTO `purchased-info`(`name`, `address`, `E-mailAddress`, `CreditCardHolder`, `CreditCardNumber`, `ExpirationDate`, `transaction_id`) VALUES ('$name','$address','$email','$holder','$number','$date','$transaction_id')";

            if($this->conn->query($sql)){
                header("location: ../views/purchase.php");
            }
            else{
                die("Error in deleting data ".$this->conn->error);
            }
        }

        public function saveTransaction($user_id, $items, $transaction_code){
            
                $sql = "INSERT INTO `transaction`(`transaction_id`, `product_code`, `user_id`) VALUES ('$transaction_code','$items','$user_id')";

                if($this->conn->query($sql)){
                    
                }
                else{
                    die("Error in deleting data ".$this->conn->error);
                }
        }


    }