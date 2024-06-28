<?php
session_start();
$Nama_Kasir = $_SESSION['nama'];

if (empty($_SESSION['nama'])) {
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.svg" rel="icon">
    <title>Rahyu Komputer</title>
    <?php include ('./css/css.php') ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include ('./view/index/sidebar.php') ?>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <?php include ('./view/index/topbar.php') ?>
                <!-- Topbar -->

                <?php include ('./view/index/halaman.php') ?>

                <!-- Modal Logout -->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to logout?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary"
                                    data-dismiss="modal">Cancel</button>
                                <a href="models/proses_logout.php" class="btn btn-primary">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->

            </div>
            <!---Container Fluid-->
            <!-- Footer -->
            <?php include ('./view/index/footer.php') ?>
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include ('./js/js.php') ?>
</body>

</html>