<?php

    include 'dbcon.php';

    session_start();

    if(!isset($_SESSION['username'])) {
        echo "You are Logged Out";
        header('location:login.php');
    }

    $status="";

    if (isset($_POST['code']) && $_POST['code']!=""){
      $code = $_POST['code'];
      $q="SELECT * FROM `products` WHERE `code`='$code'";
      $query = mysqli_query($con,$q);
      $res1 = mysqli_fetch_assoc($query);
      $name = $res1['name'];
      $code = $res1['code'];
      $features= $res1['features'];
      $features1= $res1['features1'];
      $price = $res1['price'];
      $image = $res1['image'];
      
      $cartArray = array(
        $code=>array(
        'name'=>$name,
        'code'=>$code,
        'features'=>$features,
        'features1'=>$features1,
        'price'=>$price,
        'quantity'=>1,
        'image'=>$image)
      );

    if(empty($_SESSION["shopping_cart"])) {
      $_SESSION["shopping_cart"] = $cartArray;
      $status = "<div class='box'>Product is added to your cart!</div>";
    }else{
      $array_keys = array_keys($_SESSION["shopping_cart"]);
      if(in_array($code,$array_keys)) {
        $status = "<div class='box' style='color:red;'>
        Product is already added to your cart!</div>";	
      } else {
      $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
      $status = "<div class='box'>Product is added to your cart!</div>";
      }
    
      }
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Settop Box Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-primary">
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
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Contact Us
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">+91 9231334822</a>
                        <a class="dropdown-item" href="#">+91 9347238553</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a class="btn btn-outline-success form-control mr-sm-2 color-black">Welcome Back <span><?php echo $_SESSION['username'] ?></span></p>
                    <a class="btn btn-outline-success form-control mr-sm-2 color-black" href="cart.php">Cart</a>
                    <a class="btn btn-outline-success my-2 my-sm-0" href="logout.php">Logout</a>
                </form>
        </div>
    </nav>
</head>

<body>

    <div style="text-align: center;">
        <h1> Select Appropriate SetTop Box And Channel Pack </h1>
    </div>


    <table class="table table-hover text-center">
        <thead>
            <tr>
              <th></th>
              <th scope="col"> Image</th>
              <th scope="col"> Name</th>
              <th scope="col"> Features</th>
              <th scope="col"> Price</th>
              <th scope="col">Select</th>
            </tr>
        </thead>

        <?php

            include 'dbcon.php';

            $q= "select * from products";

            $query = mysqli_query($con,$q);

            while ($res1 = mysqli_fetch_array($query)) {
                
        ?>
      <form method="post" action="">
        <tbody>
            <tr class="text-center">
                <td style="text-align: center;"></td>
                <td style="text-align: center;"><?php"<div class='image'><img src='".$res1['image']." width='100px' height='100px''></div>" ?></td>
                <td style="text-align: center;"><?php echo "<div class='name'>".$res1['name']."</div>" ?></td>
                <td style="text-align: center;"><p><?php echo "<div class='name'>".$res1['features']."</div>" ?></p><br><p><?php echo "<div class='name'>".$res1['features1']."</div>"?></p></td>
                <td style="text-align: center;"><span>₹ </span><?php echo "<div class='price'>".$res1['price']."</div>" ?></td>
                <td style="text-align: center;"><button class="btn btn-primary" type="submit">Select</button></td>
            </tr>
        </tbody>
      </form>
        <?php
            }
        ?>    
    </table>



    <!-- Footer -->
    <footer class="page-footer font-small stylish-color-dark pt-4">
      <!-- Footer Links -->
      <div class="container text-center text-md-left">
        <!-- Grid row -->
        <div class="row">
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
      <!-- Footer Links -->
      <!-- Social buttons -->
      <ul class="list-unstyled list-inline text-center">
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
      <!-- Social buttons -->

    <!-- Copyright -->
    <div class="copy">
      <div class="footer-copyright text-center py-3 color-black">
        BINGE TV Copyright © 2020
      </div>
    </div>
    <!-- Copyright -->

    </footer>

</body>

</html>