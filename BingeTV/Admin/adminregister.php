<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BINGE TV Admin Register</title>
    <?php
    
        include 'dbcon.php';

        if(isset($_POST['submit'])){
            $username = mysqli_real_escape_string($con,$_POST['username']);
            $email =mysqli_real_escape_string($con,$_POST['email']);
            $phone = mysqli_real_escape_string($con,$_POST['phone']);
            $password = mysqli_real_escape_string($con,$_POST['password']);
            $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

            $pass = password_hash($password, PASSWORD_BCRYPT);
            $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

            $emailquery = "select * from adminlogin where email = '$email'";
            $query= mysqli_query($con,$emailquery);

            $emailcount = mysqli_num_rows($query);

            if($emailcount>0){
                ?>
                    <script>
                        alert("email already exists");
                    </script>
                <?php
            }else{
                if($password === $cpassword){
                    $insertquery = "insert into adminlogin( username, email, phone, password, cpassword) values( '$username', '$email', '$phone', '$pass', '$cpass')";

                    $iquery = mysqli_query($con,$insertquery);

                    if($iquery){
                        ?>
                            <script>
                                alert("Inserted Successful");
                            </script>
                        <?php
                        ?>
                        <script>
                            location.replace("adminlogin.php");
                        </script>                      
                <?php
                    }else{
                        ?>
                            <script>
                                alert("NO Inserted");
                            </script>
                        <?php
                    }
                }else{
                    ?>
                            <script>
                                alert("Password Not Matching");
                            </script>
                        <?php
                }
            }

        }
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Castoro&display=swap" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Castoro', serif;
        }

        body{
            background:url(tv-remote.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        header{
            width: 100%;
            height: 10vh;
            background-color: #0093E9;
            background-image: linear-gradient(160deg, black 0%, #ffffff 100%);
            position: relative;
        }

        .nav navbar{
            width: 100%;
            height: 15vh;
            display: flex;
            justify-content: space-around;
            align-items: center;
            position: absolute;
        }

        .logo h1{
            color: white;
            font-size: 1.6rem;
            text-transform: uppercase;
            font-weight: bold;
        }

        .main_div{
            width: 100%;
            height: 100vh;
            position: relative;
        }

        .box{
            width: 400px;
            position: absolute;
            top: 50%;
            left:50%;
            transform: translate(-50%,-50%);
            padding: 50px;
            background: rgba(0, 0, 0,0.8);
            border-radius: 10px;
        }

        .box h1,p,a{
            margin-bottom: 30px;
            color: #fff;
            text-align: center;
            text-transform: capitalize;
        }

        .box .inputBox{
            position: relative;
        }

        .box .inputBox input{
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: #fff;
            letter-spacing: 1px;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid white;
            background: transparent;
            outline: none;
        }

        .box .inputBox label{
            position: absolute;
            top: 0;
            left: 0;
            letter-spacing: 1px;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            transition: 0.5s;
        }

        .box .inputBox input:focus ~ label,
        .box .inputBox input:valid ~ label{    
            top:-20px;
            left: 0;
            color: #03a9f4;
            font-size: 12px;
        }

        .box input[type="submit"]{
            background: transparent;
            border: none;
            outline: none;
            color: #fff;
            background: #03a9f4;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 14px;
        }

        .eye{
            position: absolute;
            color:white;
        }

        .eye1 {
            position: absolute;
            color:white;
        }

        #hide1 {
            display:none;
        }

        #hide3 {
            display:none;
        }

        .btnprimary{
            background: transparent;
            border: none;
            outline: none;
            color: #fff;
            background: #03a9f4;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 14px;
            text-align:center;
        }

        .registerbtn{
            text-align:center;
        }
    </style>
</head>
<body>
        <div class="main_div">
            <div class="box">
                <h1>BINGE TV</h1>
                <p>Admin Register</p>
                <p>Register your Account</p>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="inputBox">
                        <input type="text" name="username" autocomplete="off" required>
                        <label>Full Name</label>
                    </div>

                    <div class="inputBox">
                        <input type="text" name="email" autocomplete="off" required>
                        <label>Email</label>
                    </div>

                    <div class="inputBox">
                        <input type="number" name="phone" autocomplete="off" required>
                        <label>Phone</label>
                    </div>

                    <div class="inputBox">
                        <input type="password" name="password" autocomplete="off" id="MyInput" required>
                        <label>Password</label>
                        <span class="eye" onClick="myFunction()">
                            <i id="hide1" class="fa fa-eye"></i>
                            <i id="hide2" class="fa fa-eye-slash"></i>
                        </span> 
                    </div>

                    <div class="inputBox">
                        <input type="password" name="cpassword" autocomplete="off" id="MyInput1" required>
                        <label>Repeat Password</label>
                        <span class="eye1" onClick="myFunction1()">
                            <i id="hide3" class="fa fa-eye"></i>
                            <i id="hide4" class="fa fa-eye-slash"></i>
                        </span>
                    </div>


                    <div class="registerbtn">
                        <button type="submit" name="submit" class="btnprimary">Register</button>
                    </div>

                    <br><br>

                    <hr>
                    <br>
                <p>Already have an Account?<a href="adminlogin.php">Login</a></p>
                </form>
            </div>
        </div>

        <script>
        function myFunction() {
            var x = document.getElementById("MyInput");
            var y = document.getElementById("hide1");
            var z = document.getElementById("hide2");
        
            if(x.type === 'password') {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            }else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }     
        }

        function myFunction1() {
            var l = document.getElementById("MyInput1");
            var m = document.getElementById("hide3");
            var n = document.getElementById("hide4");

            if(l.type === 'password') {
                l.type = "text";
                m.style.display = "block";
                n.style.display = "none";
            }else {
                l.type = "password";
                m.style.display = "none";
                n.style.display = "block";
            }
        }
    </script>
</body>
</html>