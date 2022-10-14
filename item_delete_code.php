<?php
    session_start();
    include ('includes/config.php');

    // $id = $_GET['rn'];
    if(isset($_POST['delete'])){
        $id = $_POST['ID']; 
        $query = "DELETE FROM items WHERE ItemID='$id'";
        $do = mysqli_query($conn,$query);
        if($do){
            $_SESSION['status'] = "You've deleted the item Successfully";
            $_SESSION['status_code'] = "success";
            header("Location: product_list.php");
            exit(0);
           
        }else{

            $_SESSION['status'] = "Something goes wrong! Try again..";
            $_SESSION['status_code'] = "error";
            header("Location: product_list.php");
            exit(0);
         
        }
    }
?>