<?php
    session_start();
    include ('includes/config.php');

    $id = $_GET['ItemID'];

    if(isset($_POST['item_edit'])){
        $target = "assets/images/".basename($_FILES['itemimage']['name']);

        $name = $_POST['name'];
        $default = $_POST['default'];
        $category = $_POST['category'];
        $image = $_FILES['itemimage']['name'];

        // $query = "INSERT INTO items (Item_Name,Price_Default,Price_Large,Item_Image,Category_Name) VALUES 
        // ('$name','$default','$large','$image','$category')";
        // $do = mysqli_query($conn,$query);

        $sql = "UPDATE items SET 
        Item_Name = '$name',
        Price_Default = '$default',
        Item_Image = '$image',
        Category_Name = '$category' WHERE ItemID=$id";
        $do = mysqli_query($conn,$sql);

        if(move_uploaded_file($_FILES['itemimage']['tmp_name'],$target)){
            $msg = "image successfully";
            header("Location: product_list.php");
        }else {
            $msg= "There was a problem";
        }
        if($do){
            $_SESSION['status'] = "You've updated the item Successfully";
            $_SESSION['status_code'] = "success";
            header("Location: product_list.php");
            exit(0);         
       }
       else{
            $_SESSION['status'] = "Something goes wrong! Try again..";
            $_SESSION['status_code'] = "error";
            header("Location: product_list.php");
            exit(0);
       
       }
    }

?>