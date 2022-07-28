<?php

require_once "database.php";
class Product extends Database{
    function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}

    function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	public function addProduct($product_name, $product_code, $product_image, $price, $tmp_name){

		$sql = "INSERT INTO `tblproduct`(`name`, `code`, `image`, `price`) VALUES ('$product_name','$product_code','../assets/images/$product_image','$price')";

		if($this->conn->query($sql)){
			$destination = "../assets/images/$product_image";

            //move the file
            move_uploaded_file($tmp_name, $destination);
			header("Location: ../admin/dashboard.php");
			exit;
		}
		else{
			die("Error in creating user ".$this->conn->error);
		}
	}

	public function getProduct($id){

		$sql = "SELECT * FROM tblproduct WHERE id = $id";

		if($result = $this->conn->query($sql)){
			return $result -> fetch_assoc();
		}
		else{
			die("Error in retrieving data ".$this->conn->error);
		}
	}

	public function addFavorite($user_id,$product_id){

		$sql = "INSERT INTO `favorite`(`product_id`, `user_id`) VALUES ('$product_id','$user_id')";

		if($this->conn->query($sql)){
			header("Location: ../views/view-favorites.php");
			exit;
		}
		else{
			die("Error in creating user ".$this->conn->error);
		}
	}


	public function getAllFavorite($id){

		$sql = "SELECT * FROM `favorite` WHERE user_id = $id";

		if($result = $this->conn->query($sql)){
			
			if($result -> num_rows == 0){
				echo "<div class='no-records h3'>Favorite Item is Empty</div>	";
			}
			return $result;
			
		}else{
			die("Error in retrieving data ".$this->conn->error);
		}
	}
	
	public function deleteFavorite($product_id,$user_id){

		$sql = "DELETE FROM `favorite` WHERE product_id = $product_id AND user_id = $user_id";

		if($this->conn->query($sql)){
			header("Location: ../views/view-favorites.php");
			exit;
		}
		else{
			die("Error in creating user ".$this->conn->error);
		}
	}
	
	
}


?>