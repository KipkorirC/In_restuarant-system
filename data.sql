/*
      $food_id = $row['food_id'];
                    $food_title = $row['food_title'];
                    $food_description = $row['food_description'];
                    $food_image = $row['food_image'];
                    $food_price = $row['food_price'];
*/
CREATE TABLE food(
    food_id BIGSERIAL,
    food_title VARCHAR,
    food_description VARCHAR,
    food_image VARCHAR,
    food_price INT 
);
CREATE TABLE ordered_food(
    order_id INT,
    order_name VARCHAR,
    order_price INT
);
CREATE TABLE category(
    category_id BIGSERIAL,
    category_title VARCHAR
);
ALTER TABLE food ADD food_category VARCHAR;
CREATE TABLE order_details(
    order_id INT PRIMARY KEY,
    ip_address VARCHAR,
    quantity INT
);
CREATE TABLE whole_data(
    product_id INT PRIMARY KEY,
    ip_address VARCHAR,
    quantity INT
);