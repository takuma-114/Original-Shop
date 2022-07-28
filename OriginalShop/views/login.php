
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div class="container mx-auto mt-5">
	<a href="../admin/index.php" class="text-dark col"><i class="fas fa-chevron-left fa-2x"></i></a>
</div>
<div class="text-center"><img src="../assets/images/logo.png" style="width:100px; height:100px;">
    <div class="container mt-3">
        <div class="card w-50 mx-auto border-0">
            <div class="card-header text-center bg-white mb-4">
                <h1>LOGIN</h1>
            </div>
            <div class="card-body text-center">
                <form action="../actions/login.php" method="post" class="form-group">
                <input type="text" name="username" id="username" class="form-control mb-4" placeholder="Please Enter Username" autofocus required>

                <input type="password" name="password" id="password" class="form-control" placeholder="Please Enter Password">

                <button type="submit" class="btn btn-outline-success col-8 mt-5 text-center">Login</button>
                </form>

                <p class="text-center mt-3"><a href="../views/register.php" class="btn btn-outline-primary col-8 text-decoration-none">Create Account</a></p>
            </div>
        </div>
    </div>
    
</body>
</html>
