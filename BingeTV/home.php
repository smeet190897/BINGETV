<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BINGE TV Home</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.7.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.7.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
</head>
    <body>
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
                    <a class="nav-link" href="product.php">Products</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Contact Us
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#contact">+91 9231334822</a>
                        <a class="dropdown-item" href="#contact">+91 9347238553</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#about">About Us</a>
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
    
        <div class="center_content">
            <h1>Welcome To Binge TV</h1>
            <h2>India's best cable TV</h2>
        </div>

        <div id="about" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
              <li data-target="#about" data-slide-to="0" class="active"></li>
              <li data-target="#about" data-slide-to="1"></li>
              <li data-target="#about" data-slide-to="2"></li>
            </ul> 
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="product-images/tv1.jpg" alt="Features" width="100%" height="700" >
                <div class="carousel-caption">
                  <h3 class="font-weight-bolder" style="color:black font-size:1.6rem">FEATURES</h3>
                  <p style="color:black font-size:1.2rem">Get access to your favourite language channels from across different regions.</p>
                  <p style="color:black font-size:1.2rem">Features that ensure best-in-class viewing experience.</p>
                  <p style="color:black font-size:1.2rem">Enjoy the best of everything – Live TV, News, Movies, TV Shows and Originals.</p>
                </div>   
              </div>
              <div class="carousel-item">
                <img src="product-images/cabletv.jpg" alt="Service" width="100%" height="700">
                <div class="carousel-caption">
                  <h3 class="font-weight-bolder" style="color:black font-size:1.6rem">SERVICES</h3>
                  <p style="color:black font-size:1.2rem">Best source of entertainment fully packed in a small settop box.</p>
                  <p style="color:black font-size:1.2rem">The Perfect Services When In Need Onto Your Doorstep.</p>
                </div>   
              </div>
              <div class="carousel-item" id="contact">
                <img src="product-images/tv6.jpeg" alt="Contact Us" width="100%" height="700">
                <div class="carousel-caption">
                  <h3 class="font-weight-bolder" style="color:black font-size:1.6rem">Contact Us</h3>
                    <p style="color:black font-size:1.2rem">+91 9231334822</p>
                    <p style="color:black font-size:1.2rem">+91 9347238553</p>
                  <p></p>
                </div>   
              </div>
            </div>
            <a class="carousel-control-prev" href="#about" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#about" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>

          <hr>
          <div class="probtn">
            <div class="SetTopBox text-center">
              <p class="text-center">Buy Your Products Here</p>
              <img src="product-images/smart-box.jpg" class="img-edit" height="150" width="150" onclick="openCity(event, 'London')" alt="movie">
              <div>
                <a href="product.php">
                <button type="submit" name="submit" class="setprimary">Select Products</button></a>
              </div>
            </div>
            <hr>

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

        <hr> 
      

<!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4">
    <!-- Footer Links -->
    <div class="container text-center text-md-center"> 
      <!-- Grid row --> 
          <h5 class="font-weight-bolder text-uppercase mt-3 mb-4">BINGE TV</h5>
          <p class="font-weight-bold"></p>     
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
  <!-- Footer -->
  </body>
</html>
