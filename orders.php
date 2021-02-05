<?php 
include "include/dbconnect.php";

if(isset($_GET['done'])){
    $calling = mysqli_query($connect,"DELETE from orders where o_id > 0");
    redirect('index');

}

?>