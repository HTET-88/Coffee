<?php
    session_start();
    include ('includes/config.php');

    // $username = $_SESSION['User_Name'];

    if(isset($_POST['editBtn'])){
        $user_name = $_POST['account'];
        $user_email = $_POST['email'];
        $user_staffid = $_POST['staffid'];
        $user_position = $_POST['position'];
        $user_branch = $_POST['branch'];
        $user_pwd = $_POST['password'];

        $sql = "UPDATE user SET 
        User_Name = '$user_name',
        User_Email = '$user_email',
        User_StaffID = '$user_staffid',
        User_Position = '$user_position',
        User_Branch = '$user_branch',
        User_Password = '$user_pwd' WHERE User_Name= '".$_SESSION['User_Name']."'";
        $do = mysqli_query($conn,$sql);

        if($do){
            $_SESSION['status'] = "You've updated the account Successfully";
            $_SESSION['status_code'] = "success";
            header("Location: product_list.php");
            exit(0);         
       }
       else{
            $_SESSION['status'] = "Something goes wrong! Try again..";
            $_SESSION['status_code'] = "error";
            header("Location: profile.php");
            exit(0);
       
       }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap 3 Contact Form - reusable form</title>
        <!-- Latest compiled and minified CSS -->
        <?php
            include ('includes/style.php');
        ?>
        <style>
            #form_container
            {
                padding:15px 15px;
                margin-top:15px;
                background: rgba(0,0,0,0.5);	
                color:#fff;
            }
            body
            {
                background-color: #000;
                background-image: url("https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=878&q=80");
                background-size: cover;
                background-repeat:no-repeat;

            }
            .back
            {
                width: 100px;
            }
        </style>
    </head>
    <body >
        <div class="container">
            <div class="row">
                <div class="col-md-6 " id="form_container">
                    <h2>Profile</h2> 
                    <?php
                        $sqon="SELECT * FROM user WHERE User_Name = '".$_SESSION['User_Name']."'";
                        $do=mysqli_query($conn,$sqon);
                        $row = mysqli_fetch_assoc($do);
                    ?>
                    <form method="POST" >
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="message"> Name:</label>
                                <input class="form-control" name="account" type="text" value="<?php echo $row['User_Name'];?>" maxlength="6000"></textarea>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="message"> Email:</label>
                                <input class="form-control" type="text" name="email" value="<?php echo $row['User_Email'];?>"  maxlength="6000" ></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name">Staff_ID:</label>
                                <input type="text" name="staffid" value="<?php echo $row['User_StaffID'];?>" class="form-control" >
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="text"> Position:</label>
                                <input type="text" name="position" class="form-control" value="<?php echo $row['User_Position'];?>" >
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="text">Branch:</label>
                                <input class="form-control" name="branch" type="text"  maxlength="6000" value="<?php echo $row['User_Branch'];?>"></textarea>
                            </div>
                            <div class="col-sm-12 form-group mb-3">
                                <label for="message">Password:</label>
                                <input class="form-control" name="password" type="text" value="<?php echo $row['User_Password'];?>" maxlength="6000" ></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group profile-btns d-flex justify-content-between" > 
                                <a href="product_list.php" type="button" class="btn btn-default btn-outline-light back"> Back</a>
                                <button type="submit"  class="btn btn-default btn-outline-light back" name="editBtn">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        Model text here...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div> -->

<?php
    include ('includes/script.php');
?>

<!-- <script>
$(document).ready(function(){
  $("#editBtn").click(function(){
    $('#myModal').modal('show');
  });
});
</script> -->
        
    </body>
</html>