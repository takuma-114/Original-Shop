<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<?php
include "../admin/admin-menu.php";
?>

    <main class="card w-25 mx-auto my-5">
        <div class="card-header bg-success text-white">
            <h2 class="card-title h4 mb-0"> Add New Product </h2>
        </div>

        <div class="card-body">
            <form action="../actions/add-product.php" method="post" enctype="multipart/form-data">
                <label for="product-name" class="form-label small">Product Name</label>
                <input type="text" name="product_name" id="product-name" class="form-control mb-2" required autofocus>

                <label for="price" class="form-label small">Price</label>
                <div class="input-group mb-2">
                    <div class="input-group-text">$</div>
                    <input type="number" name="price" id="price" class="form-control" required>
                </div>

                <label for="product-code" class="form-label small">Product Code</label>
                <input type="text" name="product_code" id="product-code" class="form-control mb-2" required autofocus>

                <label for="product-name" class="form-label small">Product Image</label>
                <input type="file" name="photo" id="photo" class="form-control  mb-4" accept="image/*" required>

                <button type="submit" name="btn_add" class="btn btn-success col-6">Add</button>
                <a href="../admin/dashboard.php" class="btn btn-outline-secondary col-5">Cancel</a>
               
            </form>
             
        </div>  
         <?php
                //print_r($sections_row);
                //print_r($sections_result);
                  
        ?>
        
</body>
</html>