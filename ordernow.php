<?php include "include/dbconnect.php";



if(isset($_GET['food_id'])){
    $f_id = $_GET['food_id'];
    // checking order   

    $order= mysqli_query($connect,"SELECT * from orders where food_id ='$f_id'");
    $order = mysqli_fetch_array($order);
    if(!empty($order)){
        $qty = $order['qty']+1;  // update order qty.
        $query = mysqli_query($connect,"UPDATE orders SET qty='$qty' WHERE food_id ='$f_id'");

    }
    else{
    $query = mysqli_query($connect,"INSERT INTO orders(food_id,qty) VALUE ('$f_id','1')");
    }

    redirect('index');


}




?>