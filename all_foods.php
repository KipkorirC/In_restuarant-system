<?php
    include('include/connect.php');
    include('functions/functions.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>baze poa</title>
    <!--bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!-- first child-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
    <img src="./images/logo.png" alt = "" class = "logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="all_foods.php">Food</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./admin/index.php">log in</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa-solid fa-utensils"></i><sup><?php get_number_of_orders();?></sup></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="order.php">order</a>
        </li>
</ul>
        <form class="d-flex" action ="search.php" method = "GET">
        <input class="form-control me-2" type="search" name="search_data" placeholder="Search" aria-label="Search">
        <input type="submit" value="Search" name = "search_food" class="btn btn-outline-success">
        </form>
    </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="navbar-nav me-auto">
        <li class="nav-item">
            <a href="" class="nav-link">Welcome collins</a>
        </li>
    </ul>
</nav>
<?php
    order();
?>
<div class="bg-light">
    <h3 class="text-center">Baze poa</h3>
</div>
<div class="row bg-dark">
    <div class="col-md-9">
        <!--products-->
        <div class="row">
            <?php
                get_all_food();
            ?>   
        </div>
    </div>

    <div class="col-md-3">
        <!--sidenav-->
        <ul class="navbar-nav text-light me-auto ">
            <li class="nav-item bg-info"><h4>Your Order</h4>
            </li>
            <?php total_price();?>  
            <!--order to be displayed-->
<!--change this function-->
<?php
get_orders();
order();   ?>
        </ul>
    </div>
</div>
<?php
        if(isset($_GET["order_food"])){
            include('order.php');
        }
    ?>
</div>
    
<!--bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>