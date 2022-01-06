<?php

	include 'dbcon.php';

	if(isset($_POST['submit'])){

		$id=$_GET['id'];
        
        $name = $_POST['name'];
        $code = $_POST['code'];
        $features = $_POST['features'];
        $features1 = $_POST['features1'];
        $price = $_POST['price'];
        $image = $_FILES['image']; 
        
    	$q= " update products set id=$id, name='$name', code='$code', features='$features', features1='$features1', price=$price, image='$image' where id=$id";
    	
        $query = mysqli_query($con,$q);
        
        header('location:adminpanel.php');
    }	

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div class="col-lg-6 m-auto ">
    	
    	<form method="post">

    		<br><br><div class="card">

    			<div class="card-header bg-dark">

    				<h1 class="text-white text-center">Update into Products</h1>
    				
    			</div>
    			
    			<label> Name: </label>
                <input type="text" name="name" class="form-control"> <br>
                
                <label> Code: </label>
                <input type="text" name="code" class="form-control"> <br>

                <label> Features: </label>
                <input type="text" name="features" class="form-control"> <br>

                <label> More Features: </label>
                <input type="text" name="features1" class="form-control"> <br>

                <label> Price: </label>
                <input type="text" name="price" class="form-control"> <br>

                <label> Image: </label>
    			<input type="image" name="image" class="form-control"> <br>

    			 <button class="btn btn-success" type="Submit" name="submit">Submit</button> <br>
    		</div>

    	</form>
    </div>

</body>
</html>