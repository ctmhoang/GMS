<?php include("includes/header.php");
require_once('admin/scripts/service/impl/PhotoService.php');
require_once('admin/scripts/service/impl/CommentService.php');


if (empty($_GET['id']))
    header("Location: index.php");

$comment_service = $comment_service ?? null;
$photo_service = $photo_service ?? null;
$photo = $photo_service->findById($_GET['id']);

if (isset($_POST['submit'])) {

    $author = trim($_POST['author']);
    $body = trim($_POST['body']);


    $new_comment = new Comment(['pid' => $_GET['id'], 'author' => $author, 'body' => $body]);

    $comment_service->insert($new_comment);

} else {

    $author = "";
    $body = "";

}


$comments = $comment_service->fetchAllByPid($_GET['id']);


?>

<div class="row">
    <div class="col-lg-12">

        <!-- Blog Post -->

        <!-- Title -->
        <h1><?php echo $photo->title; ?></h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#"><?= empty($name = $photo->author) ? 'Anonymous' : $name ?></a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2030 at 9:00 PM</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="admin/<?php echo $photo->dir; ?>" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead"><?php echo $photo->caption; ?></p>
        <p><?php echo $photo->description; ?></p>

        <hr>

        <!-- Blog Comments -->

        <!-- Comments Form -->


        <div class="well">
            <h4>Leave a Comment:</h4>
            <form role="form" method="post">
                <div class="form-group">
                    <label for="author">Author</label>

                    <input type="text" name="author" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="body" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>


        <hr>

        <!-- Posted Comments -->


        <?php foreach ($comments as $comment): ?>


            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $comment->author; ?>
                        <small>August 25, 2030 at 9:30 PM</small>
                    </h4>
                    <?php echo $comment->body; ?>
                </div>
            </div>


        <?php endforeach; ?>


    </div>


    <!-- Blog Sidebar Widgets Column -->
    <!--     <div class="col-md-4"> -->


    <?php // include("includes/sidebar.php"); ?>


    <!-- </div> -->
    <!-- /.row -->

</div>

<?php include("includes/footer.php"); ?>



