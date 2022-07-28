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
    <title>Products</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
	<!-- <style>
		body { background-color:#222; color:#fff;}
		img { border:3px solid #fff; border-radius:3px;}
		img.thumbnail { width:300px;}
	</style> -->
    <!-- <style>
		* {box-sizing: border-box;}
			.img-zoom-container {
			position: relative;
			}
		.img-zoom-lens {
			position: absolute;
			border: 1px solid #d4d4d4;
			/*set the size of the lens:*/
			width: 40px;
			height: 40px;
		}
		.img-zoom-result {
			border: 1px solid #d4d4d4;
			/*set the size of the result div:*/
			width: 300px;
			height: 300px;
		}
		</style>
		<script>
		function imageZoom(imgID, resultID) {
		var img, lens, result, cx, cy;
		img = document.getElementById(imgID);
		result = document.getElementById(resultID);
		
		lens = document.createElement("DIV");
		lens.setAttribute("class", "img-zoom-lens");
		/*insert lens:*/
		img.parentElement.insertBefore(lens, img);
		/*calculate the ratio between result DIV and lens:*/
		cx = result.offsetWidth / lens.offsetWidth;
		cy = result.offsetHeight / lens.offsetHeight;
		/*set background properties for the result DIV:*/
		result.style.backgroundImage = "url('" + img.src + "')";
		result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
		/*execute a function when someone moves the cursor over the image, or the lens:*/
		lens.addEventListener("mousemove", moveLens);
		img.addEventListener("mousemove", moveLens);
		/*and also for touch screens:*/
		lens.addEventListener("touchmove", moveLens);
		img.addEventListener("touchmove", moveLens);
		function moveLens(e) {
		var pos, x, y;
		/*prevent any other actions that may occur when moving over the image:*/
		e.preventDefault();
		/*get the cursor's x and y positions:*/
		pos = getCursorPos(e);
		/*calculate the position of the lens:*/
		x = pos.x - (lens.offsetWidth / 2);
		y = pos.y - (lens.offsetHeight / 2);
		/*prevent the lens from being positioned outside the image:*/
		if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
		if (x < 0) {x = 0;}
		if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
		if (y <script 0) {y = 0;}
		/*set the position of the lens:*/
		lens.style.left = x + "px";
		lens.style.top = y + "px";
		/*display what the lens "sees":*/
		result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
	}
		function getCursorPos(e) {
		var a, x = 0, y = 0;
		e = e || window.event;
		/*get the x and y positions of the image:*/
		a = img.getBoundingClientRect();
		/*calculate the cursor's x and y coordinates, relative to the image:*/
		x = e.pageX - a.left;
		y = e.pageY - a.top;
		/*consider any page scrolling:*/
		x = x - window.pageXOffset;
		y = y - window.pageYOffset;
		return {x : x, y : y};
	}
}
</script>
	</head>
<body>

<h1>products</h1>
	<div class="img-zoom-container">
		<img id="myimage" src="Tshirt.jpg" width="300" height="240">
		<div id="myresult" class="img-zoom-result"></div>
	</div>
<script>
	imageZoom("myimage","myresult");
</script> -->

<!-- <div class="container">
<h1>jQuery ViewImage.js Demos</h1>
<h2>Img</h2>
<img src="https://unsplash.it/1200/900/?random" class="thumbnail">
<h2>Text Link</h2>
<a href="https://www.jqueryscript.net/dummy/1.jpg">Click Me</a>
<h2>Image Link</h2>
<a href="https://unsplash.it/1200/900/?random"><img src="https://unsplash.it/400/300/?random"></a>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="../assets/view-image.js"></script>
<script>
	JQuery(document).ready(function(){
		JQuery.viewImage({
			'target':'.container img, .container a','delay':300
		});
	});
</script> -->

<!-- </body>
</html> -->



    <?php
    include "main-menu.php";
    ?>

<div class="bg-secondary bg-gradient px-5 py-5">
        <div class="display-3 text-center text-white">Welcome to My Shop!<br></div>
		<div class="display-5 mb-4 text-center text-white">Please Come Take a Look!</div>
</div>

<div class="container mt-5">

<div id="product-grid mx-auto">
	<div class="text-heading mx-auto h4">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
		  <form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image text-center mt-2"> <img id="myImg" src="<?php echo $product_array[$key]["image"]; ?>" style="width:190px; height:155px;"></div>
			<div class="product-tile-footer">		
				<div class="product-title text-center h5"><?php echo $product_array[$key]["name"]; ?></div>
				<div class="product-price h5 mt-1"><?php echo "$".$product_array[$key]["price"]; ?></div>
				<input type="number" class="product-quantity col-3 mb-2" name="quantity" value="1" min="1" /><br>
				<a href="../actions/add-favorite.php?id=<?= $product_array[$key]['id']; ?>" class="btnAddAction btn-warning text-center text-white col-3 mr-2"><i class="fa-solid fa-star"></i></a>
				<button type="submit" class="btnAddAction btn btn-secondary col-8 mb-2">Add to Cart</button>
		
				</form>
			</div>
		</div>
	<?php
		}
	}
	?>
</div>
</div>
</div>


</body>
</html>
