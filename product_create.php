<?php
    session_start();
    include ('includes/config.php');
    if(!(isset( $_SESSION['login_user']))){
        header('Location: login.php');
    }

    if(isset($_POST['item-create'])){

        $target = "assets/images/".basename($_FILES['itemimage']['name']);

        $name = $_POST['name'];
        $default = $_POST['default'];
        $category = $_POST['category'];
        $image = $_FILES['itemimage']['name'];

        $query = "INSERT INTO items (Item_Name,Price_Default,Item_Image,Category_Name) VALUES 
        ('$name','$default','$image','$category')";
        $do = mysqli_query($conn,$query);

        if(move_uploaded_file($_FILES['itemimage']['tmp_name'],$target)){
            // $msg = "image successfully";
            $_SESSION['status'] = "You've created the item Successfully";
            $_SESSION['status_code'] = "success";
            header('Location:product_list.php');
            exit();
        }else {
            // $msg= "There was a problem";
            $_SESSION['status'] = "Something goes wrong! Try again..";
            $_SESSION['status_code'] = "error";
            header('Location:product_list.php');
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
    <title>Document</title>
    <?php
        include ('includes/style.php');
    ?>
</head>
<body id="prBody" style="background-color: #634832 ;">
        <div class="form-body">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items p-3">
                        <h3>Create New Item</h3>
                        <p>Fill the item Details.</p>
                        <form class=" " method="POST" enctype="multipart/form-data">
                            <div class="col-md-12 p-1">
                               <input class="form-control" type="text" name="name" placeholder="Item Name" required>
                            </div>
                            <div class="col-md-12 p-1 ">
                                <label for="">Default Price</label>
                                <input class="form-control" type="number" name="default" placeholder="Unit Price for Default Size" required>
                            </div>
                           
                            <div class="col-md-12 p-1">
                                <select class="form-select mt-3 " name="category" required>
                                    <option selected disabled value="">Choose Category</option>
                                    <!-- <option value="coffee">Coffee</option>
                                    <option value="tea">Tea</option>
                                    <option value="milk">Milk</option> -->
                                    <?php
                                        $sql = "SELECT * FROM items GROUP BY Category_Name";
                                        $do = mysqli_query($conn,$sql);
                                        while($row=mysqli_fetch_assoc($do))
                                        {
                                            echo '<option value="'.$row['Category_Name'].'">'.$row['Category_Name'].'</option>';
                                        }
                                    ?>
                               </select>
                                <!-- <div class="valid-feedback">You selected a position!</div>
                                <div class="invalid-feedback">Please select a position!</div> -->
                            </div>
                            <div class="col-lg-12 p-3">
                                <div class="input-group mb-3 rounded-pill bg-white shadow-sm">
                                    <input id="upload" name="itemimage" type="file"  class="form-control border-0">
                                    <!-- <input type="file" id="upload" name="img" class="form-control border-0 > -->
                                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                                    <div class="input-group-append">
                                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                    </div>
                                </div>
                                <!-- Uploaded image area-->
                                <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>
                                <div class="image-area mt-4">
                                    <img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                                </div>
						    </div>
                            <div class="form-button mt-3 mb-3 text-center d-flex justify-content-between">
                                <a href="product_list.php" type="button"  class="btn prCreate">Back</a>
                                <button id="create" type="submit" class="btn prCreate"  name="item-create">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php
        include ('includes/script.php');
    ?>
  
</body>
</html>
