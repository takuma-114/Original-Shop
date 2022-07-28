<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
        <div class="container mt-5 w-50" style="padding: top 80px;">
             <div class="card mx-auto border-0">
                <div class="card-header text-center fs-1 bg-white mb-4">
                    <h1>Register</h1>
                </div>
                <div class="card-body">
                    <form action="../actions/register.php" method="post" class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control mb-4" placeholder="First Name" required autofocus>

                        <input type="text" name="last_name" id="last_name" class="form-control mb-4" placeholder="Last Name" required autofocus>

                        <input type="text" name="username" id="username" class="form-control mb-4" placeholder="username" required autofocus>

                        <input type="password" name="password" id="password" class="form-control mb-5" placeholder="Password" required autofocus>

                        <div class="text-center"><button type="submit" class="btn btn-outline-success col-8">Register</button></div>

                        <p class="text-center mt-3 ">Already Registerd? <a href="../views/login.php" class="btn btn-outline-primary col-4 text-decoration-none">Log in</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>