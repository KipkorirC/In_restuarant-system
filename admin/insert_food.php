<?php
    include('../include/connect.php');
    if(isset($_POST['insert_food'])){
        $f_title = $_POST['food_title'];
        $insert_query = "insert into  category(category_title)values('$f_title')";
        $select_query = "select * from category where category_title='$f_title'";
        $result_select = pg_query($conn,$select_query);
        $num_rows = pg_num_rows($result_select);
        if($num_rows>0){
            echo"<script>alert('field already exists')</script>";
        }else{
        if($result_select){
            echo"<script>alert('data was inserted succesfully')</script>";
            $result = pg_query($conn,$insert_query);
                    }     
            }                           
    }
?>
<form action="" method = "POST" class="mb-2">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-secondary" id="basic-addon1">
            <i class="fa-solid fa-receipt">

            </i>
        </span>
        <input type="text" class="form-control"  name="food_title" aria-label="food" aria-describedby="basic addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="form-control bg-secondary" name="insert_food"value ="Insert food">
        <!-- <button class="bg-secondary p-2 my-3 border-0">
            Insert food
        </button>--> 
    </div>
</form>