<?php
    session_start();

    include '../classes/admin.php';
     $product = new Admin;
    $product_list = $product->getProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
</head>
<body>

<?php
include "admin-menu.php";
?>

<main class="container" style="padding-top: 50px;">
<div class="text-end">
    <div class="btn btn-success col-5 btn-lg mt-5"><a href="../views/add-product.php" class="text-decoration-none text-white">Add Product</a></div>
</div>
    <h2 class="text-muted display-6">Product Lists</h2>
        <table class="table table-hover">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Price</th>
                    <th></th> <!--leave this part for buttons-->
                    </tr>
                </thead>
                <tbody class="lead">
                    <?php
                    while($product_details = $product_list->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?= $product_details['id']; ?></td>
                        <td><?= $product_details['name']; ?></td>
                        <td><?= $product_details['code']; ?></td>
                        <td><?= $product_details['price']; ?></td>
                        <td>
                            <a href="edit-product.php?product_id=<?= $product_details['id']; ?>" class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i></a>
                            <a href="../actions/delete-product.php?product_id=<?= $product_details['id']; ?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</main>
    
</body>
</html>