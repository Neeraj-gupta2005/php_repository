<?php   
    include("connection.php"); 
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="css/signin.css">
</head>
<body>
    <div class="container">
        <div class="left">
            <h1 class="logo">YourREPO</h1>
            <p class="signin">Sign in</p>
            <p style="margin-top: 15px;margin-left: 5px;">to continue</p>
            <?php
                if(isset($_POST['signin'])){
                    $username = $_POST['username'];
                    $query = "select password from register where username = '".$username."' ";
                    $result = mysqli_query($conn,$query);

                    if ($result && mysqli_num_rows($result) == 1) {
                        // Fetch the hashed password from the result
                        $row = mysqli_fetch_assoc($result);
                        $hashpass = $row['password'];
                
                        $password = $_POST['password']; 
                        $isCorrect = password_verify($password, $hashpass);

                        if($isCorrect == 1){
                            $_SESSION['username']=$username;
                            header('location:dashboard.php');
                        }  
                        else{
                            echo '<div class="failed-box">
                                    <span class="message">Login Failed</span>
                                </div>';
                        }}
                }
            ?>
        </div>
        <div class="right">
            <form action="#" method="POST">
                <div class="input-field1">
                    <input type="text" name="username" >
                    <label for="input-field" class="placeholder">Username</label>
                </div>
                <div class="input-field2">
                    <input type="password" name="password" >
                    <label for="input-field" class="placeholder">Password</label>
                </div>
                <a href="#" class="forgot">Forgot username?</a>
                <p class="signup-noti">Don't have an account?<a href="register.php"> Sign up</a></p>
                <div class="btn">
                    <a href="register.php" class="create">Create account</a>
                    <input type="submit" value="Sign in" class="submit" name="signin">
                </div>
            </form>
        </div>
    </div>
    

    <script src="js/hover.js"></script>
</body>
</html>


