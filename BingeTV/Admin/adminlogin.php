<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BINGE TV Admin Login</title>
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

        .eye{
            position: absolute;
            color:white;
        }

        .loginbtn{
            text-align:center;
        }

        #hide1 {
            display:none;
        }
    </style>
</head>
<body>
    <?php

        include 'dbcon.php';

        if(isset($_POST['submit'])){
            $email =$_POST['email'];
            $password =$_POST['password'];

            $email_search="select * from adminlogin where email='$email'";
            $query = mysqli_query($con,$email_search);

            $email_count = mysqli_num_rows($query);

            if($email_count){
                $email_pass = mysqli_fetch_assoc($query);

                $db_pass=$email_pass['password'];

                $_SESSION['username']=$email_pass['username'];

                $pass_decode= password_verify($password,$db_pass);

                if($pass_decode){
                    ?>
                        <script>
                            alert("Login Successful");
                        </script>
                        <?php
                        ?>
                            <script>
                                location.replace("adminpanel.php");
                            </script>                      
                    <?php
                }else{
                    ?>
                        <script>
                            alert("Incorrect Password");
                        </script>
                    <?php
                }
            }else{
                ?>
                    <script>
                        alert("Invalid Email");
                    </script>
                <?php
            }
        }
    ?>

    <div class="main_div">
        <div class="box">
            <h1>BINGE TV</h1>
            <p>Admin Login</p>
            <p>Login to your Account</p>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="inputBox">
                    <input type="email" name="email" autocomplete="off" required>
                    <label>Email</label>
                </div>

                <div class="inputBox">
                    <input type="password" name="password" autocomplete="off" id="MyInput" required>
                    <label>Password</label>
                    <span class="eye" onClick="myFunction()">
                        <i id="hide1" class="fa fa-eye"></i>
                        <i id="hide2" class="fa fa-eye-slash"></i>
                    </span>
                </div>
                <div class="loginbtn">
                        <button type="submit" name="submit" class="btnprimary">Login</button>
                </div>
                <br><br>
                <hr>
                <br>
                <p>Don't hava an Account?<a href="adminregister.php">Register</a></p>
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
    </script>
</body>
</html>