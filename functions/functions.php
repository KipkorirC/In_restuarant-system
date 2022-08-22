<?php
    include('./include/connect.php');
    function get_food(){
        global $conn;
    $select_query = "select * from food order by random() OFFSET 0 LIMIT 9;";
                $result_query = pg_query($conn,$select_query);
                while($row = pg_fetch_object($result_query)){
                    $food_id = $row->food_id;
                    $food_title = $row->food_title;
                    $food_description = $row->food_description;
                    $food_image = $row->food_image;
                    $food_price = $row->food_price;
                    echo"
                    <div class='col-md-4 mb-1'>
                    <div class='card'>
                        <img class='card-img-top' src='./admin/food_images/$food_image' alt='$food_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$food_title</h5>
                                <p class='card-text'>$food_description</p>
                                <a href='index.php?ordered_food=$food_id' class='btn btn-dark'>Order</a>
                                <a href='#' class='btn btn-secondary'>$food_price</a>
                            </div>
                    </div>
                </div>
                    ";
            };
        }
    function get_all_food(){
        global $conn;
        $select_query = "select * from food order by random()";
                    $result_query = pg_query($conn,$select_query);
                    while($row = pg_fetch_object($result_query)){
                        $food_id = $row->food_id;
                        $food_title = $row->food_title;
                        $food_description = $row->food_description;
                        $food_image = $row->food_image;
                        $food_price = $row->food_price;
                        echo"
                        <div class='col-md-4 mb-1'>
                        <div class='card'>
                            <img class='card-img-top' src='./admin/food_images/$food_image' alt='$food_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$food_title</h5>
                                    <p class='card-text'>$food_description</p>
                                    <a href='index.php?ordered_food=$food_id' class='btn btn-dark'>Order</a>
                                    <a href='#' class='btn btn-secondary'>$food_price</a>
                                </div>
                        </div>
                    </div>
                        ";
                };
    }    
    function search_data(){
        global $conn;
        if(isset($_GET['search_food'])){
        $search_data   =  $_GET['search_data'];
        $select_query = "select * from food where food_title like '%$search_data%';";
        $result_query = pg_query($conn,$select_query);
        $num_rows = pg_num_rows($result_query);
        if($num_rows==0){
            echo" <h1 class='text-center text-light'>!!We do not offer this product at the moment</h1>";
        
        }
                    while($row = pg_fetch_object($result_query)){
                        $food_id = $row->food_id;
                        $food_title = $row->food_title;
                        $food_description = $row->food_description;
                        $food_image = $row->food_image;
                        $food_price = $row->food_price;
                        echo"
                        <div class='col-md-4 mb-1'>
                        <div class='card'>
                            <img class='card-img-top' src='./admin/food_images/$food_image' alt='$food_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$food_title</h5>
                                    <p class='card-text'>$food_description</p>
                                    <a href='index.php?ordered_food=$food_id' class='btn btn-dark'>Order</a>
                                    <a href='#' class='btn btn-secondary'>$food_price</a>
                                </div>
                        </div>
                    </div>
                        ";
                };
    }
}
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;

function tab(){
    if(isset($_GET['ordered_food'])){
        global $conn;
        $ip = getIPAddress();  
        $get_id = $_GET['ordered_food'];
        $select_query = "SELECT * FROM order_details where ip_address = $ip and order_id = $get_id";
        $result_query = pg_query($conn,$select_query);// or die(pg_last_error($conn));
        $num_rows = pg_num_rows($result_query);
        $row = pg_fetch_object($result_query);
        if($num_rows<0){
            echo"<script>alert('ITEM  not ADDED')</script>";
        }else{
            $insert_query = "insert into ordered_food(order_id)values
            ($get_id)";
            $result2_query  = pg_query($conn,$insert_query);
            if($result2_query){
            echo"<script>alert('ITEM ADDED')</script>";
            }
        }

        echo "<script>alert('not to cart')</script>";
    }
}
function order(){
    if(isset($_GET['ordered_food'])){
        global $conn;
        $ip = getIPAddress();  
        $get_id = $_GET['ordered_food'];
        $select_query = "SELECT * FROM order_details where ip_address = '$ip' and order_id = $get_id";
        $result_query = pg_query($conn,$select_query); //or die(pg_last_error($conn));
        $num_rows = pg_num_rows($result_query);
        $row = pg_fetch_object($result_query);
        if($num_rows>0){
            echo"<script>alert('ITEM is already in cart')</script>";
            echo"<script>window.open('index.php','_self')</script>";
        }else{
            $insert_query = "insert into order_details(order_id,ip_address,quantity)values
            ($get_id,'$ip',0)";
            $result2_query  = pg_query($conn,$insert_query);
            if($result2_query){
                echo"<script>window.open('index.php','_self')</script>";
                echo "<script>alert('ITEM ADDED TO CART')</script>";
            }
        }

        
    }
}
//getting cart item numbers
function get_number_of_orders(){
    if(isset($_GET['ordered_food'])){
        global $conn;
        $ip = getIPAddress();  
        $select_query = "SELECT * FROM order_details where ip_address = '$ip'";
        $result_query = pg_query($conn,$select_query); //or die(pg_last_error($conn));
        $order_count = pg_num_rows($result_query);
        $row = pg_fetch_object($result_query);
        }else{
            global $conn;
            $ip = getIPAddress();  
            $select_query = "SELECT * FROM order_details where ip_address = '$ip'";
            $result_query = pg_query($conn,$select_query); //or die(pg_last_error($conn));
            $order_count = pg_num_rows($result_query);
            $row = pg_fetch_object($result_query);
        }

        echo "$order_count";
    }

    function get_orders(){
        global $conn;
        $ip = getIPAddress(); 
        $select_query = "SELECT * FROM food WHERE  EXISTS (SELECT * FROM order_details where ip_address = '::1' AND
          food.food_id=order_details.order_id);";
        $result_query = pg_query($conn,$select_query);
        while ($row = pg_fetch_object($result_query)){
            $id = $row->food_id;
            $name = $row->food_title;
            $price = $row->food_price;
           echo "<li class='nav-item'>
    <a href='' class='nav-link text-light'>$id</a>
    <a href='' class='nav-link text-light'>$name</a>
    <input type='submit' value='$price' name = '' class='btn btn-outline-success'>
    </li>";
        };
    }
    function total_price(){
        global $conn;
        $ip = getIPAddress();
        $select_query = "SELECT SUM(food_price) FROM food WHERE  EXISTS (SELECT * FROM order_details where ip_address = '$ip' AND
        food.food_id=order_details.order_id);";
        $result_query = pg_query($conn,$select_query);
        while($row = pg_fetch_object($result_query)){
            $result = $row->sum;
            echo"<li class='nav-item bg-info'>Total Price: $result</li>";
        }
    }
    function checkout(){
        
    }
?>            