<?php
session_start();

include '../classes/admin.php';
$user = new Admin;
$user_list = $user->displayPurchase();
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

<main class="container" style="padding-top: 80px;">
    <h2 class="text-muted display-6">Purchaser Lists</h2>
        <table class="table table-hover">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>E-mail Address</th>
                    <th>Credit Card Holder</th>
                    <th>Credit Card Number</th>
                    <th>Expiration Date</th>
                    <th></th>
                    </tr>
                </thead>

                <tbody class="lead">
                    <?php
                    while($user_details = $user_list->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?= $user_details['id']; ?></td>
                        <td><?= $user_details['name']; ?></td>
                        <td><?= $user_details['address']; ?></td>
                        <td><?= $user_details['E-mailAddress']; ?></td>
                        <td><?= $user_details['CreditCardHolder']; ?></td>
                        <td><?= $user_details['CreditCardNumber']; ?></td>
                        <td><?= $user_details['ExpirationDate']; ?></td>
                        <td><a href='../admin/purchase.php?tcode=<?=$user_details['transaction_id']?>' class='btn btn-outline-secondary'>Transaction Details</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
    
        </table>
</main>
</body>
</html>