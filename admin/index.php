<?php
/** @noinspection PhpIncludeInspection */
include("includes/header.php");
require_once 'includes/Session.php';

require_once('scripts/PhotoService.php');
require_once 'scripts/CommentService.php';
require_once 'scripts/UserService.php';

$photo_service = $photo_service ?? null;
$comment_service = $comment_service ?? null;
$user_service = $user_service ?? null;

$session = $session ?? null;

if (!$session->isSignedIn()) {
    header('Location: login.php');
}
?>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>


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
                        Admin
                        <small>Dashboard</small>
                    </h1>


                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $session::getCount(); ?></div>
                                            <div>New Views</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">

                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-photo fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo count($photo_service->fetchAll()); ?></div>
                                            <div>Photos</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="photo.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Total Photos in Gallery</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo count($user_service->fetchAll()); ?>

                                            </div>

                                            <div>Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="user.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Total Users</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-support fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo count($comment_service->fetchAll()); ?>

                                            </div>
                                            <div>Comments</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="comment.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Total Comments</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>


                    </div> <!--First Row-->


                    <div class="row" style="display: flex; justify-content: center">


                        <div id="piechart" style="width: 900px; height: 500px;"></div>


                    </div>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <script type="text/javascript">
        google.load("visualization", "1", {packages: ["corechart"]});
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Views',    <?php echo $session::getCount(); ?>],
                ['Comment',   <?php echo count($comment_service->fetchAll()); ?>],
                ['Users',    <?php echo count($user_service->fetchAll()); ?>],
                ['Photos', <?php echo count($photo_service->fetchAll()); ?>]

            ]);

            var options = {
                legend: 'none',
                pieSliceText: 'none',
                title: 'My Daily Activities',
                backgroundColor: 'transparent'

            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>

<?php include("includes/footer.php"); ?>