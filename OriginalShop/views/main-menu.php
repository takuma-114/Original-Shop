

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container mx-auto">
        <div class="navbar-brand">
            <h1 class="h3"><img src="../assets/images/logo.png" style="width:70px; height:70px;"></h1>
        </div>
        <button class="navbar-toggler" data-bs-target="#menu" data-bs-toggle="collapse"> 
            <span class="navbar-toggler-icon"></span>
        </button>
       
           
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="products.php" class="nav-link text-white"><i class="fa-solid fa-shirt text-success"></i>Products</a></li>
                <li class="nav-item"><a href="view-favorites.php" class="nav-link text-white"><i class="fa-solid fa-star text-warning"></i>Favorite</a></li>
                <li class="nav-item"><a href="index.php" class="nav-link text-white"><i class="fa-solid fa-cart-shopping text-primary"></i>Cart</a></li>
                <li class="nav-item"><a href="" class="nav-link text-white"><i class="fa-solid fa-user text-secondary"></i><?= $_SESSION['username'];?></a></li>
                <li class="nav-item"><a href="../actions/logout.php" class="nav-link text-danger">Log out</a></li>
            </ul>
        </div>
    </div>
</nav>

<?php
    echo "<body style=\"background-image: url('../assets/images/images.jpg');\">";
?>



 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
