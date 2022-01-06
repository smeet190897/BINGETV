<?php

    session_start();

    include 'dbcon.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-primary" style="background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%); height: 15vh;" >
        <a class="navbar-brand" href="#" style="font-size:1.6rem">BINGE TV </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product.php">Product</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Contact Us
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">+91 9231334822</a>
                        <a class="dropdown-item" href="#">+91 9347238553</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="home.php">About Us</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Coming Soon...</a>
                </li>
            </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a class="btn form-control mr-sm-2 color-black">Welcome Back <span><?php echo $_SESSION['username'] ?></span></p>
                    <a class="btn btn-outline-success form-control mr-sm-2" href="cart.php">Cart</a>
                    <a class="btn btn-outline-success my-2 my-sm-0" href="logout.php">Logout</a>
                </form>
        </div>
    </nav>
</header>

    <div class="text-center">
        <h1 >Thank You For Using</h1>
        <h1 >BINGE TV</h1>
        <h1><span><?php echo $_SESSION['username'] ?></span></h1>
        
        <a href="home.php"><button class="text-center btn btn-primary">Go To Home Page</button></a>
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