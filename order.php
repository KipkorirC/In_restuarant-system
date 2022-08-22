<?php
    include('./include/connect.php');
    if(isset($_POST['insert_food'])){
        $f_title = $_POST['food_title'];
        $insert_query = "insert into  food(food_title)values('$f_title')";
        $select_query = "select * from food where food_title='$f_title'";
        $result_select = pg_query($conn,$select_query);
        $num_rows = pg_num_rows($result_select);
        $result = pg_query($conn,$insert_query);
        if($num_rows>0){
            echo"<script>alert('field already exists')</script>";
        }else{
        if($result){
            echo"<script>alert('data was inserted succesfully')</script>";
                    }     
            }                           
    }
?>