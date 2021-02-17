<?php /** @noinspection PhpIncludeInspection */
include("includes/header.php");
require_once 'includes/Session.php';
require_once('scripts/Photo.php');
require_once('scripts/PhotoService.php');

$session = $session ?? null;
$photo_service = $photo_service ?? null;

if (!$session->isSignedIn()) {
    header('Location: login.php');
}

if (!isset($_GET['id'])) {

    header("Location: photo.php");

} else {

    $photo = $photo_service->findById($_GET['id']);

    if (isset($_POST['update'])) {

        if ($photo) {

            $photo->title = $_POST['title'];
            $photo->caption = $_POST['caption'];
            $photo->altertext = $_POST['altertext'];
            $photo->description = $_POST['desc'];

            print_r($photo);
            $photo_service->save($photo->rawData,$photo->id);

        }
    }
}


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
                        Photos
                        <small>Subheading</small>
                    </h1>

                    <form action="" method="post">

                        <div class="col-md-8">

                            <div class="form-group">

                                <input type="text" name="title" class="form-control"
                                       value="<?php echo $photo->title; ?>">

                            </div>


                            <div class="form-group">

                                <a class="thumbnail" href="#"><img src="<?php echo $photo->dir; ?>"
                                                                   alt=""></a>

                            </div>


                            <div class="form-group">
                                <label for="caption">Caption</label>
                                <input type="text" name="caption" class="form-control"
                                       value="<?php echo $photo->caption; ?>">

                            </div>

                            <div class="form-group">
                                <label for="caption">Alternate Text</label>
                                <input type="text" name="altertext" class="form-control"
                                       value="<?php echo $photo->altertext; ?>">

                            </div>

                            <div class="form-group">
                                <label for="caption">Description</label>
                                <textarea class="form-control" name="desc" id="" cols="30"
                                          rows="10"><?php echo $photo->description; ?></textarea>

                            </div>

                        </div>


                        <div class="col-md-4">
                            <div class="photo-info-box">
                                <div class="info-box-header">
                                    <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span>
                                    </h4>
                                </div>
                                <div class="inside">
                                    <div class="box-inner">
                                        <p class="text ">
                                            Photo Id: <span class="data photo_id_box"><?=$photo->id?></span>
                                        </p>
                                        <p class="text">
                                            Filename: <span class="data"><?=$photo->name?>></span>
                                        </p>
                                        <p class="text">
                                            File Size: <span class="data"><?=$photo->size?>></span>
                                        </p>
                                    </div>
                                    <div class="info-box-footer clearfix">
                                        <div class="info-box-delete pull-left">
                                            <a href="delete_photo.php?id=<?php echo $photo->id; ?>"
                                               class="btn btn-danger btn-lg ">Delete</a>
                                        </div>
                                        <div class="info-box-update pull-right ">
                                            <input type="submit" name="update" value="Update"
                                                   class="btn btn-primary btn-lg ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>