<?php include "include/dbconnect.php" ;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coldchilli</title>
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body style="background-color: gray;">
    <nav class="navbar navbar-expand-lg navbar-light bg-white d-print-none sticky-top">
        <div class="container">
             <div class="navbar-brand"><img src="photos/logo.png" alt="" width="50%" height="40px"></div>
             
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="" class="nav-link" style="color: black;" >Home</a></li>
                <li class="nav-item"><a href="" class="nav-link" style="color: black;" >About</a></li>
                <li class="nav-item"><a href="" class="nav-link" style="color: black;" >Orders</a></li>

                <li class="nav-item"><a href="#add_cat" data-bs-toggle="modal" class="nav-link"style="color: black;" >Add category</a></li>
                <li class="nav-item"><a href="#add_recipe" data-bs-toggle="modal" class="nav-link"style="color: black;" >Add Recipe</a></li>
                
            </ul>
            <!-- <img src="photos/centerlogo.png" alt="" width="4%" height="40px" style="margin-left:10px ;"> -->
        </div>
    </nav>

    <div class="container-fluid mt-1 d-print-none">
        <div class="row">
            <div class="col-lg-2">
                <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 0px;">
                    <img src="photos/centerlogo.png" alt="" width="12%" height="20px" style="margin-left:10px; margin-top:-2px;">Categories
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php
                        $fetch_ctg = mysqli_query($connect,"select * from categories");
                        while($ctg=mysqli_fetch_array($fetch_ctg)){?> 

                        <li class="dropdown-item btn btn-info w-100 list-group-item"><a href="" style="text-decoration: none; width:100%; color:black; "><?= $ctg['title']; ?></a></li>
                        <!-- <li class="dropdown-divider"></li> -->
                        <?php }?> 
                    </ul>
                </div>
                
                
            </div>
            <div class="col-lg-7">
                <div class="row">
                <?php
                    $fetch_img = mysqli_query($connect,"select * from foods");
                    while($foods = mysqli_fetch_array($fetch_img)){
                ?>
                    <div class="col-3 mb-2" >
                       <a href="#" style="text-decoration: none; color:black;">
                            <div class="card" style="background-color: gray;">
                                    <div class="card-body">
                                        <img src="photos/<?= $foods['image']; ?>" alt="" width="100%" height="150px">
                                        <h5 class="text-center"><?= $foods['f_name'];?></h5>
                                        <h5 class="text-center" style="font-weight: bolder;">Rs.<?= $foods['f_price'];?>/-</h5>

                                        <a href="ordernow.php?food_id=<?= $foods['f_id'];?>" class="btn btn-success btn-osm mx-auto w-100" style="border-radius: 0%;">Buy</a>   
                            
                                    </div>
                            </div>
                       </a>
                    </div>
                    <?php } ?>
                     
                </div>                
            </div>

            <div class="col-lg-3 d-print-none">
           
                <table class="table">
               
                    <tr class="table-info">
                        <th>Sno.</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Amount</th>
                    </tr>

                    <!-- calling Table and Delet button work. -->
                    <?php
                    $total = 0;
                        $calling_table = mysqli_query($connect,"SELECT * from orders JOIN foods ON orders.food_id = foods.f_id");
                        while($data = mysqli_fetch_array($calling_table)):
                            
                        $total += ( $data['f_price'] * $data['qty'] );

                            
                     ?>
                    
                    <tr style="color:wheat;"> 
                    <td><?=$data['o_id'];?></td>
                    <td><?= $data['f_name'];?></td>
                    <td><?=$data['qty'];?></td>                   
                    <td><?= $data['f_price'] * $data['qty'];?></td>
                    <td>
                        <a href="index.php?o_id=<?=$data['o_id'];?>" class="text-danger float-end"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
        </svg></a>

        <!-- Delete work -->

        <?php 
            if(isset($_GET['o_id'])){

                $delet = $_GET['o_id'];

                $qurery = mysqli_query($connect," DELETE FROM orders where o_id = '$delet'");
            }
        
        ?>
                        </td>
                        </tr>
                    <?php endwhile; ?> 

                </table>
                <!--- End calling -->
                
                        <div class="card bg-warning" style="position: fixed; bottom:0; width:100%;border-radius: 0%;">
                            <div class="card-body">
                                <h1>Rs. <?= $total ?>/-</h1>
                                <a href="#final" data-bs-toggle="modal" class="btn btn-dark d-print-none" style="border-radius: 0%;">Order Now</a>
                            </div>
                        </div>                
            </div>
        </div> 
    </div>
    <!-- Modal for Print orders. -->

    <div class="modal fade" id="final">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                    <table class="table">
               
               <tr class="table-info">
                   <th>Sno.</th>
                   <th>Item</th>
                   <th>Qty</th>
                   <th>Amount</th>
               </tr>

               <!-- calling Table and Delet button work. -->
               <?php
               $total = 0;
                   $calling_table = mysqli_query($connect,"SELECT * from orders JOIN foods ON orders.food_id = foods.f_id");
                   while($data = mysqli_fetch_array($calling_table)):
                       
                   $total += ( $data['f_price'] * $data['qty'] );

                       
                ?>
               
               <tr> 
               <td><?=$data['o_id'];?></td>
               <td><?= $data['f_name'];?></td>
               <td><?=$data['qty'];?></td>                   
               <td><?= $data['f_price'] * $data['qty'];?></td>
               <td>
                   <a href="index.php?o_id=<?=$data['o_id'];?>" class="text-danger float-end d-print-none"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
   </svg></a>

   <!-- Delete work -->

   <?php 
       if(isset($_GET['o_id'])){

           $delet = $_GET['o_id'];

           $qurery = mysqli_query($connect," DELETE FROM orders where o_id = '$delet'");
       }
   
   ?>
                   </td>
                   </tr>
               <?php endwhile; ?> 

           </table>
                    </div>
                    <div class="modal-footer">
                    <h1>Total amount: Rs. <?= $total ?>/-</h1>
                        <button type="button" onclick="window.print();" class="btn btn-danger d-print-none">Print</button>
                        <a href="orders.php?done=1" class="btn btn-success d-print-none">Down</a>
                    </div>
                </div>
            </div>
    
    </div>
    <!-- END of print modal -->
    <!-- modal creation for image insert with ditiels. -->

    <div class="modal fade" id="add_recipe">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="">Food name:</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Price:</label>
                            <input type="number" name="price" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">image:</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Categories:</label>
                            <select name="category_id">

                            <?php
                                $calling_ctrg_id = mysqli_query($connect,"select * from categories");

                                while($row = mysqli_fetch_array($calling_ctrg_id)){ ?>
                            
                                <option value="<?= $row['id'];?>"> <?= $row['title']; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                             <input type="submit" name="send" class="btn btn-info w-100">
                        </div>
                    </form>
                    <?php 
                        if(isset($_POST['send'])){
                            $name = $_POST['name'];
                            $price = $_POST['price'];
                            $image = $_FILES['image']['name'];
                            $tmp_image = $_FILES['image']['tmp_name'];
                            move_uploaded_file($tmp_image,"photos/$image");

                            $category = $_POST['category_id'];
                            $qurery = mysqli_query($connect,"INSERT INTO foods (f_name,f_price,image,categories_id) VALUES ('$name','$price','$image','$category')");
                            redirect('index');
                            
                        }

                    ?>
                </div>
            </div>
        </div>
    </div>



    <!-- modal for category-->
    <div class="modal fade" id="add_cat">
            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form action="index.php" method="post">
                                       <div class="mb-3">
                                       <label for="">Categories Name:</label>
                                        <input type="text" name="title" class="form-control">
                                       </div>
                                       <div class="mb-3">
                                        <input type="submit" name="send_cat" class="btn btn-success float-end">
                                       </div>
                                    </form>
                                </div>
                            </div>
            </div>
    </div>

<?php
    if(isset($_POST['send_cat'])){
        $title = $_POST['title'];

        $qurery = mysqli_query($connect,"insert into categories (title) value ('$title')");
        if($qurery){
            redirect('index');
        }

    }
?>
    <!-- end of category work -->
     

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>