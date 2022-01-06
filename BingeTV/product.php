<?php

    session_start();
    include('dbcon.php');
    $sn=1;
    $status="";
    if (isset($_POST['code']) && $_POST['code']!=""){
    $code = $_POST['code'];
    $result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $code = $row['code'];
    $features = $row['features'];
    $features1 = $row['features1'];
    $price = $row['price'];
    $image = $row['image'];

    $cartArray = array(
        $code=>array(
        'name'=>$name,
        'code'=>$code,
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
<html>
<head>
<title>Products Page</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
<header>
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

</head>
<body class="text-center" style="background-image: url(product-images/.jpg)">
<div style="width:700px; margin:50 auto;">

<h1 class="text-center">Select Appropriate Set Top Box And Channel Pack</h1>   
<table class="table table-striped table-hover table-bordered" >
    <thead class="text-center bg-white">
        <div class="bg-white">
            <th></th>
            <th>Image</th>
            <th>Name</th>
            <th>Features</th>
            <th></th>
            <th>Price</th>
            <th>
        </div>
        <?php
        if(!empty($_SESSION["shopping_cart"])) {
        $cart_count = count(array_keys($_SESSION["shopping_cart"]));
        ?>
        <div class="cart_div">
        <a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
        </div></th>
    </thead>
    
      <?php
        }
        $result = mysqli_query($con,"SELECT * FROM `products`");
        while($row = mysqli_fetch_assoc($result)){
            echo    "<form method='post' action=''>
                        <tbody class='text-center'>
                        <td><input type='hidden' name='code' value=".$row['code']." /></td>
                        <td><div class='image'><img src='".$row['image']."'/></div></td>
                        <td><div class='name'>".$row['name']."</div></td>
                        <td><p><div class='features'>".$row['features']."</div></p><br><p><div class='features1'>".$row['features1']."</div></p><td>
                        <td><div class='price'>₹".$row['price']."</div></td>
                        <td><button type='submit' class='buy btn-primary'>Buy Now</button></td>
                    </tbody>
                </form>"
		   	  ;
        }
mysqli_close($con);

?>


<div style="clear:both;"></div>
    
    </table>
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

<br /><br />
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