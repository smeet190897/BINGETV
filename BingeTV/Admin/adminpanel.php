<?php

    session_start();

    if(!isset($_SESSION['username'])) {
        echo "You are Logged Out";
        header('location:adminlogin.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-primary" style="background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%); height: 15vh;">
        <a class="navbar-brand" href="#">BINGE TV </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Admin">Admin DB</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Databases
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#user">User Databaase</a>
                        <a class="dropdown-item" href="#product">Product Database</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#checkout">Checkout Database</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
                <form class="form-inline my-2 my-lg-0">
                    <p>Welcome Back <span><?php echo $_SESSION['username'] ?></span></p>
                    <a class="btn btn-outline-success my-2 my-sm-0" href="logout.php">Logout</a>
                </form>
        </div>
    </nav>
    
    <div class="container">

        <div class="col-lg-12">
<!--Admin Database -->
            <div>
                <h1 class="text-warning text-center" id="Admin"> Admin Database</h1>

                <table class="table table-striped table-hover table-bordered">

                    <tr class="text-center">
                
                        <th> Id </th>
                        <th> Username </th>
                        <th> Email </th>
                        <th> Phone </th>
                        <th> Password </th>
                        <th> Delete </th>

                    </tr>

                    <?php

                        include 'dbcon.php';

                        $q= "select * from adminlogin";

                        $query = mysqli_query($con,$q);

                        while ($res1 = mysqli_fetch_array($query)) {
                                          
                    ?>

                    <tr class="text-center">
                      
                        <td><?php echo $res1['id'] ?></td>
                        <td><?php echo $res1['username'] ?></td>
                        <td><?php echo $res1['email'] ?></td>
                        <td><?php echo $res1['phone'] ?></td>
                        <td><?php echo $res1['password'] ?></td>
                        <td><button class="btn-danger btn"><a href="delete.php?id=<?php echo $res1['id']; ?>" class="text-white"> Delete </a></button></td>

                    </tr>

                    <?php
                        }
                    ?>

                </table>
            </div>
<!--User Database -->
            <div>
                <h1 class="text-warning text-center" id="user"> User Database</h1>

                <table class="table table-striped table-hover table-bordered">

                    <tr class="text-center">
                
                        <th> Id </th>
                        <th> Username </th>
                        <th> Email </th>
                        <th> Phone </th>
                        <th> Password </th>
                        <th> Delete </th>

                    </tr>

                    <?php

                        include 'dbcon.php';

                        $q= "select * from res";

                        $query = mysqli_query($con,$q);

                        while ($res1 = mysqli_fetch_array($query)) {
                                       
                    ?>

                    <tr class="text-center">
                      
                        <td><?php echo $res1['id'] ?></td>
                        <td><?php echo $res1['username'] ?></td>
                        <td><?php echo $res1['email'] ?></td>
                        <td><?php echo $res1['phone'] ?></td>
                        <td><?php echo $res1['password'] ?></td>
                        <td><button class="btn-danger btn"><a href="delete1.php?id=<?php echo $res1['id']; ?>" class="text-white"> Delete </a></button></td>

                    </tr>

                    <?php
                        }
                    ?>

                </table>
            </div>
<!--Products Database -->       
            <div>
                <h1 class="text-warning text-center" id="product"> Product Database</h1>
                <br>
                    <div class="table-data__tool-right text-center">
                        <a href="insertproducts.php"><button class="text-center btn btn-primary">
                        <i class="zmdi zmdi-plus"></i>add item</button></a>
                    </div>
                <br>
                <table class="table table-striped table-hover table-bordered">

                    <tr class="text-center">
                
                        <th> Id </th>
                        <th> Name </th>
                        <th> Code </th>
                        <th> Features </th>
                        <th> More Features</th>
                        <th> Price </th>
                        <th> Image </th>
                        <th> Update </th>
                        <th> Delete </th>

                    </tr>

                    <?php

                        include 'dbcon.php';

                        $q= "select * from products";

                        $query = mysqli_query($con,$q);

                        while ($res1 = mysqli_fetch_array($query)) {
                            
                        
                    ?>

                    <tr class="text-center">  

                        <td><?php echo $res1['id'] ?></td>
                        <td><?php echo $res1['name'] ?></td>
                        <td><?php echo $res1['code'] ?></td>
                        <td><?php echo $res1['features']?></td>
                        <td><?php echo $res1['features1']?></td>
                        <td><?php echo $res1['price'] ?></td>
                        <td><img src='<?php echo $product['image']; ?>' width="100" height="100" /></td>
                        <td><button class="btn-primary btn"><a href="updateproducts.php?id=<?php echo $res1['id'] ?>" class="text-white"> Update </a></button></td>
                        <td><button class="btn-danger btn"><a href="deleteproducts.php?id=<?php echo $res1['id']; ?>" class="text-white"> Delete </a></button></td>
                    
                    </tr>

                    <?php
                        }
                    ?>
                    </table>
            </div>
<!--CheckOut Database-->       
            <div>
                <h1 class="text-warning text-center" id="checkout"> Checkout Database </h1>
                <br>
                <br>
                <table class="table table-striped table-hover table-bordered">

                    <tr class="text-center">
                
                        <th> Id </th>
                        <th> Name </th>
                        <th> Email </th>
                        <th> Address </th>
                        <th> City </th>
                        <th> State</th>
                        <th> Pin Code </th>
                        <th> Delete </th>

                    </tr>

                    <?php

                        include 'dbcon.php';

                        $q= "select * from checkout";

                        $query = mysqli_query($con,$q);

                        while ($res1 = mysqli_fetch_array($query)) {
                            
                        
                    ?>

                    <tr class="text-center">  

                        <td><?php echo $res1['id'] ?></td>
                        <td><?php echo $res1['fullname'] ?></td>
                        <td><?php echo $res1['email'] ?></td>
                        <td><?php echo $res1['address'] ?></td>
                        <td><?php echo $res1['city']?></td>
                        <td><?php echo $res1['state']?></td>
                        <td><?php echo $res1['pincode'] ?></td>
                        <td><button class="btn-danger btn"><a href="delete2.php?id=<?php echo $res1['id']; ?>" class="text-white"> Delete </a></button></td>
                    
                    </tr>

                    <?php
                        }
                    ?>
                    </table>
            </div>

        </div>
    </div>
    <footer class="page-footer font-small stylish-color-dark pt-4" style="background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);">
        <!-- Footer Links -->
        <div class="container text-center text-md-center"> 
        <!-- Grid row --> 
            <h5 class="font-weight-bolder text-uppercase mt-3 mb-4">BINGE TV</h5>
            <p class="font-weight-bold"></p>     
            <!-- Social buttons -->
            <div style="color:black;">
            <ul class="list-unstyled list-inline text-center" style="color:black;">
                <li class="list-inline-item">
                    <a class="btn-floating btn-fb mx-1">
                        <i class="fab fa-facebook-f"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-tw mx-1">
                        <i class="fab fa-twitter"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-gplus mx-1">
                        <i class="fab fa-instagram"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                <a class="btn-floating btn-li mx-1">
                    <i class="fab fa-linkedin-in"> </i>
                    </a>
                </li>
            </ul>
            </div>
            <!-- Social buttons -->
            <!-- Footer Links -->           
        </div>
        <!-- Copyright -->
            <div class="copy">
                <div class="footer-copyright text-center py-3 color-black" style="color= black">
                    BINGE TV Copyright © 2020
                </div>
            </div>
            <!-- Copyright -->
        </div>
        </div>  
    </footer>
</body>
</html>