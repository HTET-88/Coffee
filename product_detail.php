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
    <title>Document</title>
    <style>
       
    </style>
    <?php include ('includes/style.php') ?>
</head>
<body id="prBody">
        <div class="form-body">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items p-3">
                        <h3>Create New Item</h3>
                        <p>Fill the item Details.</p>
                        <form class=" "  enctype="multipart/form-data">
                            <?php
                                $id = $_GET['ItemID'];
                                $query = "SELECT * FROM items WHERE ItemID='$id'";
                                $do = mysqli_query($conn,$query);
                                $row = mysqli_fetch_assoc($do);
                            ?>
                            <div class="col-md-12 p-1">
                               <input class="form-control" type="text"  value="<?php echo $row['Item_Name'];  ?>" readonly >
                            </div>
                            <div class="col-md-12 p-1 ">
                                <label for="">Default Size</label>
                                <input class="form-control" type="number"  value="<?php echo $row['Price_Default']; ?>" readonly>
                            </div>
                           
                            <div class="col-md-12 p-1">
                                <input type="text" class="form-control" value="<?php echo $row['Category_Name']; ?>" readonly>
                                <!-- <div class="valid-feedback">You selected a position!</div>
                                <div class="invalid-feedback">Please select a position!</div> -->
                            </div>
                            <div class="col-lg-12 p-3">
                                <div class="input-group mb-3 rounded-pill bg-white shadow-sm">
                                    <input id="upload"  type=""  class="form-control border-0" readonly >
                                    <label id="upload-label" for="upload" class="font-weight-light text-muted"> <?php echo $row['Item_Image']; ?></label>
                                    <div class="input-group-append">
                                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Image file</small></label>
                                    </div>
                                </div>
                                <!-- Uploaded image area-->
                                <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>
                                <div class="image-area mt-4">
                                    <img id="imageResult" src="assets/images/<?php echo $row['Item_Image'];?>" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                                </div>
						    </div>
                            <div class="form-button mt-3 mb-3 text-center">
                                <input type="button" class="mybutton btn prCreate" onclick="showModal()" value="Edit" /> 
                                <!-- <button id=""  class="btn editbtn prCreate" >Edit</button> -->
                                <a href="product_list.php" type="button" class="btn prCreate" >Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Edit Item</h4>
                    </div>
                    <div class="modal-body">
                        <form action="item_edit.php?ItemID=<?= $id ?>" method="POST" enctype="multipart/form-data">
                            <?php
                                    $id = $_GET['ItemID'];
                                    $query = "SELECT * FROM items WHERE ItemID='$id'";
                                    $do = mysqli_query($conn,$query);
                                    $row = mysqli_fetch_assoc($do);
                            ?>
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Item Name</label>
                                <div class="col-sm-10 mb-2">
                                    <input type="text" class="form-control form-control-sm" id="colFormLabelSm" name="name" value="<?php echo $row['Item_Name']; ?>">
                                </div>
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Default Price</label>
                                <div class="col-sm-10 mb-2" >
                                    <input type="number" class="form-control form-control-sm" id="colFormLabelSm" name="default" value="<?php echo $row['Price_Default']; ?>">
                                </div>
                                
                                <label class="col-sm-2 col-form-label col-form-label-sm" for="inlineFormCustomSelectPref">Category</label>
                                <div class="col-sm-10 mb-2">
                                    <select class="custom-select form-control" id="inlineFormCustomSelectPref" name="category">
                                        <option selected><?php echo $row['Category_Name'] ?></option>
                                        <option value="coffee ">Coffee</option>
                                        <option value="tea">Tea</option>
                                        <option value="milk">Milk</option>
                                    </select>
                                </div>
                                <label  class="col-sm-2 col-form-label col-form-label-sm" for="exampleFormControlFile1">Image </label>
                                <div class="col-sm-10 mb-2">
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="itemimage" value="<?php echo $row['Item_Image']; ?> " required>
                                </div>
                               
                                
                            </div>
                            <div class="text-center"> 
                                <button class="prCreate btn" name="item_edit" type="submit">Done</button>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div> -->
                </div>
            </div>
        </div>

        
    <?php include ('includes/script.php') ?>
    <script>
        function showModal() {
            $('#myModal').modal('show');
        }
       
    </script>
    
</body>
</html>