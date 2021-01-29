<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coldchilli</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <div class="navbar-brand">Cold-chilli</div>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="" class="nav-link">Orders</a></li>
                <li class="nav-item"><a href="" class="nav-link">Cart</a></li>
                <li class="nav-item"><a href="" class="nav-link">login</a></li>
                <li class="nav-item"><a href="#add" data-toggle="modal" class="nav-link">Add-food</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-2">
                <div class="list-group"><a href="" class="list-group-item list-group-item-active">barger</a></div>
                <div class="list-group"><a href="" class="list-group-item list-group-item-active">ice-cream</a></div>
                <div class="list-group"><a href="" class="list-group-item list-group-item-active">biryani</a></div>
                <div class="list-group"><a href="" class="list-group-item list-group-item-active">biryani</a></div>
                <div class="list-group"><a href="" class="list-group-item list-group-item-active">biryani</a></div>
                <div class="list-group"><a href="" class="list-group-item list-group-item-active">biryani</a></div>
                <div class="list-group"><a href="" class="list-group-item list-group-item-active">biryani</a></div>
                <div class="list-group"><a href="" class="list-group-item list-group-item-active">biryani</a></div>
                listinggg........
            </div>
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-2 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <img src="" alt=""> --> food image...
                            </div>
                            <div class="card-bottom" class="text-center">
                                <h5 class="text-center">Rs.price/-</h5>
                                <button class="btn btn-success" style="width: 100%;">Bay</button>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>

            <div class="col-lg-3">
                <h1>added food</h1>
                
            </div>
        </div> 
    </div>
    <!-- modal creation -->

    <div class="modal fade" id="add">
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
                             <input type="submit" name="send" class="btn btn-info w-100">
                        </div>
                    </form>
                    <?php 
                        if(isset($_POST['send'])){
                            $name=$_POST['name'];
                            $price=$_POST['price'];

                            $image=$_POST['image']['name'];
                            $tmp_image=$_POST['tmp_image']['name'];
                            
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>




    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>