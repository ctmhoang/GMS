<?php include("includes/header.php");
require_once('scripts/bean/Photo.php');
require_once('scripts/service/impl/PhotoService.php');
require_once 'scripts/service/impl/CommentService.php';

if (!$session->isSignedIn()) {
    header('Location: login.php');
}
$photo_service = $photo_service ?? null;
$comment_service = $comment_service ?? null;

$message = $session->getMessage();

$photos = $photo_service->fetchAll();


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
                        <small></small>
                    </h1>

                    <p class="bg-success"> <?= $message ?></p>


                    <div class="col-md-12">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Id</th>
                                <th>File Name</th>
                                <th>Tittle</th>
                                <th>size</th>
                                <th>Comments</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($photos as $photo): ?>

                                <tr>
                                    <td><img class="admin-photo-thumbnail" src="<?php echo $photo->dir; ?>"
                                             alt="">

                                        <div class="action_links">

                                            <a class="delete_link" href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
                                            <a href="edit_photo.php?id=<?php echo $photo->id; ?>">Edit</a>
                                            <a href="../photo.php?id=<?php echo $photo->id; ?>">View</a>

                                        </div>


                                    </td>
                                    <td><?php echo $photo->id; ?> </td>
                                    <td><?php echo $photo->name; ?></td>
                                    <td><?php echo $photo->title; ?></td>
                                    <td><?php echo $photo->size; ?></td>
                                    <td>
                                        <?= $photo->path ?>
                                        <a href="comment_photo.php?id=<?= $photo->id ?>"> <?= count($comments = $comment_service->fetchAllByPid($photo->id)) ?> </a>
                                    </td>

                                </tr>


                            <?php endforeach; ?>


                            </tbody>
                        </table> <!--End of Table-->


                    </div>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>