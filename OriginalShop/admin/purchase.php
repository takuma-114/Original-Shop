<?php
session_start();
$transcation_code = $_GET['tcode'];

include '../classes/admin.php';
$user = new Admin;
$product_list = $user->viewTransaction($transcation_code);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Purchase</title>
    <style>
        .image-thumbnail{
            width: 50px;
            height: auto;
    
        }
    </style>
</head>
<body>

<?php
include "admin-menu.php";
?>


<main class="container" style="padding-top: 80px;">
    <h2 class="text-muted display-6">Items Purchased </h2>
        <table class="table table-hover">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th></th>
                    <th>Product Code</th>
                    <th>Price</th>
                    <th></th> <!--leave this part for buttons-->
                    </tr>
                </thead>
                <tbody class="lead">
                    <?php
                   for ($x = 0; $x<count($product_list); $x++){
                        $product_info = $user->viewItem($product_list[$x]);
                        echo "<tr>
                                <td>" .$product_info['id'] . "</td>
                                <td>".$product_info['name'] ."</td> 
                                <td><img src = '".$product_info['image']."' class='image-thumbnail img-thumbnail'></td>
                                <td>" .$product_info['code'] . "</td>
                                <td>" .$product_info['price'] . "</td>
                            </tr>";

                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</main>
    