<?php

session_start();
$sn=1;
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; 
    }
}
  	
}
?>
<html>
<head>
<title>Cart</title>
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary" style="background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%); height: 15vh;">
        <a class="navbar-brand" href="#">BINGE TV </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product.php">Products</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Contact Us
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">+91 9231334822</a>
                        <a class="dropdown-item" href="#">+91 9347238553</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">About Us</a>
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
<body>
<div style="width:700px; margin:50 auto;">

<h1 class="text-center">Shopping Cart</h1>   

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php">
<img src="cart-icon.png" /> Cart
<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

<div class="cart">
    <?php
        if(isset($_SESSION["shopping_cart"])){
        
            $total_price = 0;
    ?>	
<table class="table table-striped table-hover table-bordered">
    <tbody>	
        <tr>
            <th>PRODUCT IMAGE</th>
            <th>ITEM NAME</th>
            <th>QUANTITY</th>
            <th>UNIT PRICE</th>
            <th>ITEMS TOTAL</th>
        </tr>	
        <?php		
            foreach ($_SESSION["shopping_cart"] as $product){
        ?>
        <tr>
            <td><img src='<?php echo $product["image"]; ?>' width="100" height="100" /></td>
            <td><?php echo $product["name"]; ?><br />
                <form method='post' action=''>
                <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                <input type='hidden' name='action' value="remove" />
                <button type='submit' class='remove'>Remove Item</button>
                </form>
            </td>
            <td>
                <form method='post' action=''>
                    <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                    <input type='hidden' name='action' value="change" />
                    <select name='quantity' class='quantity' onChange="this.form.submit()">
                    <option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
                    <option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
                    <option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
                    <option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
                    <option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
                    </select>
                </form>
            </td>
            <td><?php echo "₹".$product["price"]; ?></td>
            <td><?php echo "₹".$product["price"]*$product["quantity"]; ?></td>
        </tr>
        <?php
            $total_price += ($product["price"]*$product["quantity"]);
        }
        ?>
        <tr>
            <td colspan="5" align="right">
                <strong>TOTAL: <?php echo "₹".$total_price; ?></strong>
            </td>
        </tr>
    </tbody>
</table>		
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>
<hr>
<div class="text-center">
    <button onClick="window.print();" class="text-center btn btn-primary">Print Your Order</button>
    <br>
    <hr>
    <a href="checkout.php"><button class="text-center btn btn-primary">Checkout Your Product</button></a>
</div>
<div style="clear:both;"></div>

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