<?php
require 'includes/header.php';
require_once 'scripts/service/impl/CommentService.php';

$comment_service = $comment_service ?? null;
$session = $session ?? null;

$message = $session->getMessage();
if (!$session->isSignedIn()) {
    header("Location: login.php");
} ?>

<?php

$comments = $comment_service->fetchAll();

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
                        All Comments

                    </h1>

                    <p class="bg-success"> <?php echo $message; ?></p>


                    <div class="col-md-12">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Body</th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($comments as $comment): ?>

                                <tr>

                                    <td><a href="../photo.php?id=<?=$comment->pid?>"><?php echo $comment->id; ?> </a></td>

                                    <td><?php echo $comment->author; ?>
                                        <div class="action_links">

                                            <a href="delete_comment.php?id=<?php echo $comment->id; ?>">Delete</a>


                                        </div>
                                    </td>


                                    <td><?php echo $comment->body; ?></td>

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