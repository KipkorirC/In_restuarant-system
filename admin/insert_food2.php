<?php
    include('../include/connect.php');
    if(isset($_POST['Insert_Food'])){
            $food_title = $_POST['food_title'];
            $food_description = $_POST['food_description'];
            $food_category = $_POST['food_categories'];
            $food_image = $_FILES['food_image']['name'];
            $tmpfood_image = $_FILES['food_image']['tmp_name'];
            $food_price = $_POST['food_price'];


            if($food_title==''or $food_description==''or $food_category==''or$food_image == ''or$food_price==''){
                echo "<script>alert('not all fields are filled')</script>";
                exit();
            }else{
                move_uploaded_file($tmpfood_image,"./food_images/$food_image");


                $insert_query = "insert into food(food_title,food_description,food_category,food_image,food_price)
                values(
                    '$food_title','$food_description','$food_category','$food_image','$food_price'
                );
                ";
                $select_query = "select * from food where food_title='$food_title'";
                $result_select = pg_query($conn,$select_query);
                $num_rows = pg_num_rows($result_select);
                if($num_rows>0){
                    echo"<script>alert('field already exists')</script>";
                }else{
                    $result_query = pg_query($conn,$insert_query);
                    echo "<script>alert('data inserted successfully')</script>";
                }
                
                    
                
            };
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert_food</title>
    <!--bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<body class="bg-dark text-light">
    <div class="container mt-3">
        <h1 class="text-center">
            Insert Food
        </h1>
        <form action="" method ="post" enctype = "multipart/form-data">
            <!-- title-->
            <div class="form-outline mb-4 m-auto">
                <label for="food_title" class="form-label">
                    Food name
                </label>
                <input type="text" name ="food_title" id = "food_title" class ="form-control" placeholder ="Enter food" autocomplete ="off"
                required = "required">
            </div>

            <!-- description-->
            <div class="form-outline mb-4 m-auto">
                <label for="food_description" class="form-label">
                    Food description
                </label>
                <input type="text" name ="food_description" id = "food_description" class ="form-control" placeholder ="Enter food description" autocomplete ="off"
                required = "required">
            </div>


            <!--category-->
            <div class="form-outline  mb-4 w-50 m-auto">
                <select name="food_categories" id="" class="form-select">
                    <option value="">select a category</option>
<?php
                        $select_query = "Select * from category";
                        
                        $result_query = pg_query($conn,$select_query);
                        while($row=pg_fetch_object($result_query)){
                            $category_title=$row -> category_title;
                            $category_id = $row -> category_id;
                            echo "<option value='$category_id'>$category_title</option>";
                        };
                        if(!$result_query){
                            echo pg_last_error($result_query);
                        }

?>


                </select>
            </div>

            <!--image-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="food_image" class="form-label">
                    Image
                </label>
                <input type="file" name ="food_image" id = "food_price" class ="form-control"
                required = "required">
            </div>


            <!--price-->
            <div class="form-outline mb-4 m-auto">
                <label for="food_price" class="form-label">
                    Food price
                </label>
                <input type="number" name ="food_price" id = "food_price" class ="form-control" placeholder ="Enter food price" autocomplete ="off"
                required = "required">
            </div>


            <div class="form-outline mb-4 m-auto">
                <input type="submit" name = "Insert_Food" class="btn btn-info mb-3 px-3"
                value = "Insert_Food">
                <button class = "my-3"><a href="../index.php" class="btn btn-info mb-3 px-3">Back Home</a></button>
            </div>
        </form>
    </div>
    
</body>
</html>