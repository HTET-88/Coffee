<!-- script -->
    <script src="https://kit.fontawesome.com/4634a0eb41.js" crossorigin="anonymous"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <?php
        if(isset($_SESSION['status']) && $_SESSION['status'] != '')
        {
            ?>
            <script>
                swal({
                    title: "<?php echo $_SESSION['status']; ?>",
                    icon: "<?php echo $_SESSION['status_code']; ?>",
                });
            </script>
            <?php
            unset($_SESSION['status']);
        }
    ?>
    <script src="assets/js/script.js"></script>

 
