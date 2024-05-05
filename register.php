<?php include("connection.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/signin.css">
</head>
<body>
    <div class="container">
        <!-- left part for design and showing messages -->
        <div class="left">
            <h1 class="logo">YourREPO</h1>
            <p class="signin">Sign up</p>
            <p style="margin-top: 15px;margin-left: 5px;">create a new account</p>
            <!-- php code to show a success message and an error -->
            <?php
                $username = $email= $password = "";
                if ($_SERVER['REQUEST_METHOD']=="POST"){

                    if(isset($_POST['register'])){
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        
                        //validate everything
                        if(empty($username) && empty($email) && empty($password)){
                            echo '<div class="failed-box">
                                        <span class="message">fields cannot be empty</span>
                                  </div>';
                        }
                        //validate username
                        elseif(empty($username)){
                            echo '<div class="failed-box">
                                        <span class="message">Username cannot be empty</span>
                                  </div>';
                        }
                        //validate email
                        elseif(empty($email)){
                            echo '<div class="failed-box">
                                        <span class="message">Email cannot be empty</span>
                                  </div>';
                        }
                        //validate password
                        elseif(empty($password)){
                            echo '<div class="failed-box">
                                        <span class="message">Password cannot be empty</span>
                                  </div>';
                        }
                        else{
                            $insert_query = "INSERT INTO register (username, email, password) VALUES ('$username', '$email', '$password')";
                            $data = mysqli_query($conn,$insert_query);
                            if($data){
                                echo '<div class="success-box">
                                            <span class="message">Registration Successful!</span>
                                    </div>';
                            }
                            else{
                                echo '<div class="failed-box">
                                            <span class="message">Registration Failed!</span>
                                    </div>
                            ';
                            }
                        }}}     
            ?>
        </div>

        <!-- right main part where all input boxes and button are -->
        <div class="right">
            <form action="#" method="POST">
                <div class="input-field1">
                    <input type="text" name="username" >
                    <label for="input-field" class="placeholder">Username</label>
                </div>
                <div class="input-field3">
                    <input type="email" name="email" >
                    <label for="input-field" class="placeholder">Email</label>
                </div>
                <div class="input-field2">
                    <input type="password" name="password" >
                    <label for="input-field" class="placeholder">Password</label>
                </div>
                
                <a href="#" class="forgot">Forgot username?</a>
                <p class="signup-noti">Already have an accound?<a href="signin.php"> Sign in</a></p>
                <div class="btn">
                    <a href="signin.php" class="create">Sign in</a>
                    <input type="submit" value="Register" class="submit" name="register">
                </div>
            </form>
        </div>


    </div>
    <script src="js/hover.js"></script>
</body>
</html>
