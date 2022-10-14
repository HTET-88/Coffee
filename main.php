<?php
    session_start();
    include ('includes/config.php');
    
    if(!(isset( $_SESSION['login_user']))){
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You're logged in..</title>
    <?php
        include ('includes/style.php');
    ?>
    <style>
        .header {
            height: 100vh;
            background-image: linear-gradient(
                rgba(0,0,0,0.8),
                rgba(0,0,0,0.8)
                ),
                url(assets/images/beans.jpg);
            background-size: cover;
            background-position: top;
            position: relative;  
        }

        .page-heading {
            position: absolute;
            top: 80%;
            left: 80%;
            transform: translate(-50%, -50%);
            color: #aaa;
            white-space: nowrap;
        }

        .page-heading-title {
            display: block;
            font-size: 3.125rem;
            font-weight: 300;
            color: wheat;
            font-size: 100px;
        }

        .page-heading-secondary {
            display: block;
            font-size: 1.25rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 4.5px;
        }
        .page-body{
            position: absolute;
            top: 25%;
            left: 60%;
            transform: translate(-50%, -50%);
            color: wheat;
            white-space: nowrap;
        }
        .link-btn{
            border: 2px solid wheat;
            color: wheat;

        }
        .link-btn:hover{
            background-color: #382313;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1 class="page-heading">
            <span class="page-heading-title">B.Beans </span>
            <span class="page-heading-secondary">Life Happens, Coffee Helps</span>
        </h1>
        <h4 class="page-body">
            <span >Logged In Account : <?php
               echo $_SESSION['User_Name'];
            ?></span>
            <div class="mt-5">
                <a href="product_create.php" type="button" class="btn btn-default link-btn " > Item Create </a>
                <a href="product_list.php" type="button" class="btn btn-default link-btn" > Item List </a>
                <a href="order.php" type="button" class="btn btn-defalult link-btn " > Order Section </a>
                <a href="logout.php" type="button" class="btn btn-default link-btn " > Log Out </a>
            </div>
        </h4>
    </div>
    <?php
        include ('includes/script.php');
    ?>
</body>
</html>

