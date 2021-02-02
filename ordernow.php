<?php include "include/dbconnect.php";



if(isset($_GET['food_id'])){
    $f_id = $_GET['food_id'];

    $query = mysqli_query($connect,"INSERT INTO orders(food_id,qty) VALUE ('$f_id','1')");

    redirect('index');


}




?>