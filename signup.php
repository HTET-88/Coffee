<?php
    session_start(); 
    include ('includes/config.php');

    if(isset($_POST['registration'])){
        $name =$_POST['name'];
        $email = $_POST['email'];
        $staffid = $_POST['staffid'];
        $position = $_POST['position'];
        $branch = $_POST['branch'];
        $password = $_POST['confirm_password'];

        $query = "INSERT INTO user (User_Name,User_Email,User_StaffID,User_Position,User_Branch,User_Password) VALUES
        ('$name','$email','$staffid','$position','$branch','$password')";
        $do = mysqli_query($conn,$query);

        if($do)
        {
            $_SESSION['status'] = "Registered Successfully";
            $_SESSION['status_code'] = "success";
            header('Location:signup.php');
            exit();
        }
        else
        {
            $_SESSION['status'] = "Something is wrong! Try again..";
            $_SESSION['status_code'] = "error";
            header('Location:signup.php');
            exit();
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
  
   <?php
       include ('includes/style.php');
   ?>

</head>
<body>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-5 text-center ">
                <h1>B.Beans</h1>
            </div>
            <div class="col-7 text-center signup shadow">
                <h2 class=" p-3" >Sign Up Here!!!</h2>
                <form method="POST" autocomplete="off">
                    <div class="form-group signup-form ">
                        <div class="input-group">
                            <input class="input--style-3 fill" type="text" placeholder="Type Your Name:" name="name">
                        </div>
                        <div class="input-group">
                            <!-- <input class="input--style-3 fill" type="text" placeholder="Type Your Email: " name="email"> -->
                            <input id="email" class="input--style-3 fill" readonly type="email" placeholder="Type Your Email: " name="email" onfocus="if (this.hasAttribute('readonly')) { this.removeAttribute('readonly');    this.blur();    this.focus();  }" />
                        </div>
                        <div class="input-group">
                            <input class="input--style-3 fill" type="text" placeholder="Type Your StaffID: " name="staffid">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3 fill " type="text" placeholder="Type Your Position: " name="position">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3 fill " type="text" placeholder="Type Branch Name: " name="branch" >
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input class="input--style-3 fill " type="password" name="password" id="password" placeholder="Type Password: ">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input class="input--style-3 fill " type="password" name="confirm_password" id="confirm_password" placeholder="Repeat Password: ">
                                    <span id="message"></span>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 d-flex ">
                            <button name="submit " class="homeBtn-signup shadow m-2">Back To HomePage!</button>
                            <button class="shadow signupBtn" type="submit" name="registration" id="register">Sign Up!</button>
                            <a href="login.php" type="button" class="loginBtn-signup m-2">Log In!</a>
                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>
    <!-- End Main Content -->

    <!-- script -->
    <?php
        include ('includes/script.php')
    ?>
    <!-- End script -->
    <!-- confirm password -->
    <script>
        $(document).ready(function(){
            $('#password, #confirm_password').on('keyup', function () {
                if($('#password').val() == $('#confirm_password').val())
                {
                $('#message').html('Matching').css('color', 'green');
                } else
                    $('#message').html('Not Matching').css('color','red');
            })
        })
    </script>
   
</body>
</html>