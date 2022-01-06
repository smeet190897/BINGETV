<?php    

  session_start();

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="Style.css">
<title>Checkout Form</title>
<?php

include 'dbcon.php';

if(isset($_POST['submit'])){

  $fullname = mysqli_real_escape_string($con,$_POST['fullname']);
  $email =mysqli_real_escape_string($con,$_POST['email']);
  $address = mysqli_real_escape_string($con,$_POST['address']);
  $city = mysqli_real_escape_string($con,$_POST['city']);
  $state = mysqli_real_escape_string($con,$_POST['state']);
  $pincode = mysqli_real_escape_string($con,$_POST['pincode']);
  $timestamp=date_default_timezone_set("Asia/Kolkata");
  

  $q= "INSERT INTO `checkout`(`fullname`, `email`, `address`, `city`, `state`, `pincode`) VALUES ('$fullname', '$email','$address','$city', '$state', '$pincode')";
    
  $query = mysqli_query($con,$q);

  if($query){
    ?>
        <script>
            alert("Payment Successful");
        </script>
    <?php
    ?>
        <script>
            location.replace("thankyou.php");
        </script>                      
        <?php
    }else{
    ?>
        <script>
            alert("Not Inserted");
        </script>
    <?php
    }
}

?>

</head>
<body>

<h1>Checkout Form</h1>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fullname" placeholder="Name" required>

            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="abc@example.com" required>

            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="Kannamwar Nagar, Vikhroli" required>

            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Mumbai" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="Maharashtra" required>
              </div>
              <div class="col-50">
                <label for="pincode">Pin Code</label>
                <input type="text" id="pincode" name="pincode" placeholder="400 001" required>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Name" required>
            <label for="ccnum">Credit/Debit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="Card No" required>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="Month" required>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2020" required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" required>
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <a href="thankyou.php"><button class="btn btn-success" type="Submit" name="submit">Complete Payment</button></a>
      </form>
    </div>
  </div>
  
  </div>
</div>

</body>
</html>
