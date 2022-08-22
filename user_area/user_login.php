<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!--bootstrap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">
            Login
        </h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="col-lg-12 col-xl-6">
            <form action=""method="post" enctype="multipart/form-data"></form>
        
    </div>
    <!--username_field-->
    <div class="form-outline mb-4">
        <label for="user_username" class="form-label">Username</label>
        <input type="text" id="user_password" class="form-control" placeholder= "Enter your Username" required = "required" name="user_username" autocomplete = "off">
    </div>
    <!--password_field-->
    <div class="form-outline mb-4">
        <label for="user_password" class="form-label">password</label>
        <input type="password" id="user_password" class="form-control" placeholder= "Enter your password" required = "required" name="user_password" autocomplete = "off">


    </div>
    <div class="mt-4 pt-2">
        <input type="submit" class="bg-dark py-2 px-3 border-0" name="user_login"value = "login">
        <p class="small fw-bold mt-2 pt-1 mb-0">         
            Dont have an account
            <a href="" class="text-danger">Register</a>
        </p>
</div>
    </div>
</div> 
</body>
</html>