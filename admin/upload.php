<?php
include("includes/header.php");
require_once('includes/Session.php');
require_once('scripts/Photo.php');
require_once('scripts/PhotoService.php');

$session = $session ?? null;
$photo_service = $photo_service ?? null;

$message = $session->getMessage();
if (!$session->isSignedIn()) {
    header('Location: login.php');
}

if (isset($_FILES['file'])) {

    $data = $_FILES['file'];
    $data['title'] = $_POST['title'];
    $data['author'] = $session->getFullName();
    $message = '';

    if ($photo_service->save($data) != -1) {
        $message = "Photo {$data['name']} uploaded successfully";
    } else {
        $message = "Errors occurred";
    }
    $session->setMessage($message);}

?>


    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->


        <?php include("includes/top_nav.php") ?>


        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->


        <?php include("includes/side_nav.php"); ?>


        <!-- /.navbar-collapse -->
    </nav>


    <div id="page-wrapper">


        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        UPLOAD
                        <small></small>
                    </h1>

                    <div class="row">
                        <div class="col-md-6">

                            <?= $message; ?>
                            <form action="upload.php" method="post" enctype="multipart/form-data">

                                <div class="form-group">

                                    <input type="text" name="title" class="form-control" required pattern="[a-zA-Z0-9]+" minlength="3">

                                </div>

                                <div class="form-group">

                                    <input type="file" name="file" required>

                                </div>

                                <button>Submit</button>
                            </form>

                        </div>

                    </div><!--End of Row-->

                    <div class="row">

                        <div class="col-lg-12">

                            <form action="upload.php" class="dropzone"></form>


                        </div>


                    </div>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>