<?php
    include ('includes/config.php');
    session_start();

    if (isset($_POST['login_user'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
      
        $sql="SELECT * FROM `user` WHERE User_Email='$email' and User_Password='$password'";
        $result=mysqli_query($conn,$sql);

        $count=mysqli_num_rows($result);
        $row= mysqli_fetch_assoc($result);
        echo $count;
        if($count==1){
                $_SESSION['login_user']=$email;
                // header("LOCATION: .php");              
            if ($row['User_Email'] === $email && $row['User_Password'] === $password){
                mysqli_fetch_assoc($result);
                $_SESSION['User_Email'] = $row['User_Email'];
                $_SESSION['User_Name'] = $row['User_Name'];
                $_SESSION['UserID'] = $row['UserID'];
                // $_SESSION['login_user']=$email;
                
                header("LOCATION: main.php");      
                exit(); 
            }
        }
        else{
            header("Location:login.php");
        }
    
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome! </title>
    <?php
        include ('includes/style.php');
    ?>
</head>
<body>
    <!-- logIn modal -->
    <div id="login" class="modal fade ">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow">
                <div class="header text-center">
                    <h1 class="modal-title">LogIn Here!!!</h1>
                    <hr>
                </div>
                <div class="modal-body">
                    <div class="text-center shake">
                        <i class = "fa fa-mug-hot mysize fa-flip"></i>
                    </div>
                    <form method="POST" action="" >
                        <div class="form-group p-2">
                            <label for="" class="p-1"> Email: </label>
                            <input type="text" class="form-control p-2" name="email" placeholder="Type Your Registered Email Here...">
                        </div>
                        <div class="form-group pb-3">
                            <label for="" class="p-1">Password: </label>
                            <input type="password" class="form-control p-2" name="password" placeholder="Type your password here...">
                        </div>
                        <div class="text-center pb-3">
                            <a href="index.php" class="homeBtn-login" name="submit p-2" type="button">Back To HomePage!</a>
                            <!-- <button name="submit p-2" class="homeBtn-login">Back To HomePage!</button> -->
                            <button class="loginBtn shadow" name="login_user" >Log In!</button>
                            <a href="signup.php" class="signupBtn-login" type="button" >Sign Up! </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <?php
        include ('includes/script.php')
    ?>
    
</body>
</html>