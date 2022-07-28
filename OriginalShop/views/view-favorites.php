<?php
session_start();

require_once "../classes/product.php";
$db_handle = new Product();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title></title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    
</head>
<body>
    <?php
    include "main-menu.php";
    ?>

	<div class="container mx-auto mt-5">
	<a href="../views/products.php" class="text-danger h3"><i class="fa-solid fa-hand-point-left">Continue Shopping</i></a>
	</div>
	
    <div id="shopping-cart">
        <div class="txt-heading h4">Favorite Item</div>
            <div class="container">
          
                <?php
                $allFaves = $db_handle->getAllFavorite($_SESSION['user_id']);
                while($fav_details = $allFaves->fetch_assoc()){
                $product_array = $db_handle->runQuery("SELECT * FROM tblproduct WHERE id = ". $fav_details["product_id"]);
                if (!empty($product_array)) { 
                    foreach($product_array as $key=>$value){
                ?>
                    <div class="product-item">
                    <a href="detail.php">
                        <form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                        <div class="product-image text-center mt-2"> <img src="<?php echo $product_array[$key]["image"]; ?>" style="width:190px; height:155px;"></div>
                    </a>
                        <div class="product-tile-footer">
                            <div class="product-title text-center h5"><?php echo $product_array[$key]["name"]; ?></div>
                            <div class="product-price h5 mt-1"><?php echo "$".$product_array[$key]["price"]; ?></div>
                            <input type="number" class="product-quantity col-3 mb-2" name="quantity" value="1" min="1" /><br>
                            <a href="../actions/delete-favorite.php?id=<?= $product_array[$key]['id']; ?>" class="btnAddAction btn-danger text-center text-white col-3"><i class="fa-solid fa-trash-can text-danger"></i></a>
                            <button type="submit" class="btnAddAction btn btn-secondary col-8 mb-2">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                <?php
                    }
                }
            }
                ?>
            </div>
        </div>
    </div>

</body>
</html>
