<?php 

    $connect=mysqli_connect('localhost','root','','coldchilli');

    function redirect($page){
        echo "<script>open('$page.php','_self')</script>";
        

    }

?>