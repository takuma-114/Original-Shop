<?php
session_start();
require_once "../classes/product.php";

$db_handle = new Product();

if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
    
            if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;

    case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}

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
     <a href="../views/index.php" class="text-danger h3"><i class="fa-solid fa-hand-point-left">Return to Cart</i></a>
	</div>

    <div id="shopping-cart">
        <div class="txt-heading h4">Shopping Cart</div>

        <?php
        if(isset($_SESSION["cart_item"])){
            $total_quantity = 0;
            $total_price = 0;
        ?>	
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
        <tbody>
        <tr>
        <th style="text-align:left;">Name</th>
        <th style="text-align:left;">Code</th>
        <th style="text-align:right;" width="5%">Quantity</th>
        <th style="text-align:right;" width="10%">Unit Price</th>
        <th style="text-align:right;" width="10%">Price</th>
        </tr>

        <?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>
                <tr>
            <td colspan="2" align="right">Total:</td>
            <td align="right"><?php echo $total_quantity; ?></td>
            <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
            <td></td>
            </tr>
            </tbody>
            </table>		
            <?php
            } else {
            ?>
            <div class="no-records h3">Your Cart is Empty</div>
            <?php 
            }
            ?>

            <div class="container mt-5 w-50" style="padding: top 80px;">
             <div class="card mx-auto border-0">
                <div class="card-header text-center fs-1 bg-white mb-4">
                    <h1>Purchaser Details</h1>
                </div>
                <div class="card-body">
                    <form action="../actions/purchase.php" method="post" class="form-group">
                        <label for="name" class="form-label">Name <span style="color: crimson">*</span></label>
                        <input type="text" name="name" id="name" class="form-control mb-3" placeholder="First Name / Last Name" required autofocus>

                        <label for="address" class="form-label">Address <span style="color: crimson">*</span></label>
                        <input type="text" name="address" id="address" class="form-control mb-3" required>

                        <label for="e-mail" class="form-label">E-mail Address <span style="color: crimson">*</span></label>
                        <input type="text" name="e-mail" id="e-mail" class="form-control mb-3" placeholder="xxx@xxxx.com" required>

                        <h2 class="text-center mb-3 mt-5">Payment Details</h2>

                        <div class="icons text-center"><img src="../assets/images/reservation-cards.png" style="width:160px; height:30px;"></div>
                        <h5 class="text-center mt-1 mb-4"> Payment Accepted Cards </h5>


                        <label for="card-name" class="form-label">Credit Card Holder <span style="color: crimson">*</span></label>
                        <input type="text" name="holder" id="holder" class="form-control mb-3" placeholder="First Name / Last Name" required>

                        <label for="card-number" class="form-label">Credit Card Number <span style="color: crimson">*</span></label>
                        <input type="text" name="number" id="number" class="form-control mb-3" pattern="^[0-9]+$" inputmode="numeric"placeholder="1234567890" required/>
                        

                        <label for="exp-date" class="form-label"> Expiration Date <span style="color: crimson">*</span></label>
                        <input type="date" name="date" id="date" class="form-control mb-3" required>

                        <div class="res-agreement text-center h5">
                            <input type="checkbox" id="agree" name="agree" required>
                            <label for="agree"> I agree in the terms and conditions </label>
                        </div>


                        <div class="btn btn-dark col-12 btn-lg mt-4"><button type="submit" class="btn text-decoration-none text-white col-12">Buy</button></div>
                        <div class="btn btn-danger col-12 btn-lg mt-3"><a href="index.php" class="text-decoration-none text-white">Cancel</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    </body>
</html>