<nav class="navbar navbar-expand-md navbar-dark bg-dark">

    <a href="dashboard.php" class="navbar-brand">
        <div class="container mx-auto">
            <h1 class="h3">Shop Admin</h1>
        </a>

        <div class="ms-auto">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="../admin/dashboard.php" class="nav-link">Product</a></li>
                <li class="nav-item"><a href="../admin/purchaser-info.php" class="nav-link">Purchaser Info</a></li>
                <li class="nav-item"><a href="../views/products.php" class="nav-link"><?= $_SESSION['username'];?></a></li>
                <li class="nav-item"><a href="../actions/logout.php" class="nav-link text-danger">Log out</a></li>
            </ul>
        </div>
    </div>
</nav>


