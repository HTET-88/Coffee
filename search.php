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
    <title>Item List!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/list.css">
    <?php
        include ('includes/style.php');
    ?>
</head>
<body> 
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>B.Beans</h3>
                <strong><i class="fa fa-mug-hot"></i></strong>
            </div>

            <ul class="list-unstyled components" >
                <li class="active">
                    <a href="#demo" data-bs-toggle="collapse" aria-expanded="false" class="" >
                        <i class="fas fa-thumbtack"></i>
                        Item <i class="fas fa-angle-down " ></i>
                    </a>
                    <ul class="collapse list-unstyled" id="demo">
                        <li>
                            <a class="" href="product_create.php">Item Create</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="order.php">
                        <i class="fas fa-receipt"></i>
                        Order 
                    </a>
                </li>
                <li>
                    <a href="main.php">
                        <i class="fas fa-map"></i>
                        Main
                    </a>
                </li>
                <li>
                    <a href="profile.php">
                        <i class="fas fa-user"></i>
                        Profile
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-paper-plane"></i>
                        Contact
                    </a>
                </li>
                <li>
                    <a href="logout.php" class="">
                      
                        <i class="bi bi-box-arrow-left"></i>
                        Logout
                    </a>
                </li>
            </ul>

           
        </nav>

        <!-- Page Content  -->
        <div id="content" >
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn shadow">
                        <i class="fas fa-align-left"></i>
                        <span>Menu </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <h2 class="ms-3">Item List</h2>
                            <!-- <li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li> -->
                        </ul>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="input-group rounded w-50 ">
                            <input type="search" class="form-control  rounded" name="user_query" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <input type="hidden" value="Search" name="search">
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </form>
                </div>
            </nav>
            <!-- <div class="line"></div> -->

            <div class="row">
            <?php

            if(isset($_POST['search'])){
                $search_query = $_POST['user_query'];
                $query = "SELECT * FROM items WHERE Item_Name LIKE '%$search_query%'";
                $do = mysqli_query($conn,$query);

                while ($row = mysqli_fetch_array($do))
                    { 
                        $id = $row['ItemID'];
                    ?>
                <div class="col-lg-3 m-4 order-shadow">
                    <div class="panel-custom pa-0 " >
						<div class="item-img text-center row" id="item-list" >
                            <div class="col-sm-8 content">
                                <div class="content-overlay"></div>
							    <img src="assets/images/<?php echo $row['Item_Image'];?>" class="img-fluid w-100" >

                                <div class="content-details fadeIn-bottom">
                                    <p class="content-title"><?php echo $row['Item_Name']; ?></p>
                                </div>
                            </div>
                            <div class="col-sm-4" id="iteminfo">
                                <ul class="list-unstyled text-center " >
                                    <li class='mb-3 mt-3'>
                                        <?php
                                            echo "<a href='product_detail.php?ItemID=$id' class='btn info'>
                                            <span><i class='fa fa-pen'></i></span>
                                        </a>";
                                        ?>
                                        
                                    </li>
                                    <li class="">
                                        <button type="hidden " class="delete-button btn" data-id="<?= $id; ?>"> 
                                        <span class='fas fa-trash'></span></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Delete Product -->
	<div id="delete_product" class="modal fade" role="dialog" aria-labelledby="deleteProductModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header ">
					<h4 class="modal-title text-danger">Delete Item</h4>
					<button type="button" class="close text-white" data-dismiss="modal">
						<i1 class="icon-cross fs-22 font-bold"></i>
					</button>
				</div>
				<form action="item_delete_code.php" method="POST">
					<div class="modal-body pb-30">
						<input type="hidden" name="ID" id="prID" class="ID" value=""><!-- id is passed into value-->
						<p>
							Once you've deleted this item, it can't be undone.<br />
							Are you sure, you want to delete this item ?
						</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn prCreate" data-dismiss="modal">Cancel</button>

						<button class="prCreate btn mr-10" type="submit" name="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /Delete Product -->


    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
            $('.delete-button').on('click', function (e) {

                var id = $(this).attr('data-id');
                // alert(id);
                // $('.confirm-delete').attr('data-id',id);
                $('.ID').attr('value', id);
                $('#delete_product').modal('show');
            });

        });
    </script>
    <?php
        include ('includes/script.php');
    ?>    
</body>
</html>