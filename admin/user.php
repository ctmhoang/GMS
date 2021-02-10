<?php /** @noinspection PhpIncludeInspection */
require_once 'includes/Session.php';
require_once 'includes/header.php';
require_once 'scripts/UserService.php';

$session = $session ?? null;
$user_service = $user_service ?? null;

$message = $session->getMessage();
$users = array_filter($user_service->fetchAll(), fn($v) => $v->id != $session->uid);
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
                        Users

                    </h1>
                    <p class="bg-success">
                        <?php echo $message; ?>
                    </p>

                    <a href="add_user.php" class="btn btn-primary">Add User</a>


                    <div class="col-md-12">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($users as $user): ?>

                                <tr>

                                    <td><?php echo $user->id?> </td>

                                    <td><?php echo $user->usr; ?>
                                        <div class="action_links">

                                            <a href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                                            <a href="edit_user.php?id=<?php echo $user->id; ?>">Edit</a>


                                        </div>
                                    </td>


                                    <td><?php echo $user->fst; ?></td>
                                    <td><?php echo $user->lst; ?></td>
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