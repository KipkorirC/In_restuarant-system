<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_panel</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../style.css" rel= "stylesheet">
    <style>
    .admin_image{
    width: 100px;
    object-fit: contain;
    }
    </style>
    <!--fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="containter_fluid p-0">
        <nav class="navbar navbar-expand-large navbar-light bg-dark">
            <img src="../images/logo.jpg" alt="" class="logo">
            <nav class="navbar navbar-expand-large navbar-light bg-dark">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light">welcome</a>
                    </li>
                </ul>
            </nav>
        </nav>

        <div class="bg-light text-center">
        <h3>Admin</h3>
        </div>
    <!--third child -->
    <div class="row">

        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class ="p-5">
            <!--<a href="#"><img src="../images/logo.jpg" alt="" class=ädmin_image></a>-->
            <p class="text-center text-light">COLLINS</p>
            </div>

            <div class="button text-center">
                <button class = "my-3"><a href="index.php?insert_food" class="nav-link text-light bg-dark my-1">Insert food category</a></button>
                <button class = "my-3"><a href="insert_food2.php" class="nav-link text-light bg-dark my-1">Insert food</a></button>
                <button class = "my-3"><a href="../index.php" class="nav-link text-light bg-dark my-1">Log out</a></button>
            </div>
        </div>
    </div>

    <div class="container my-5"></div>
    <?php
        if(isset($_GET["insert_food"])){
            include('insert_food.php');
        }
    ?>
    </div>

    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>