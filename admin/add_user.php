<?php include("includes/header.php");
require_once 'scripts/service/impl/UserService.php';


$session = $session ?? null;
$user_service = $user_service ?? null;

if (!$session->isSignedIn()) {
    header("Location: login.php");
}


if (isset($_POST['create'])) {

    $user = [];

    $user['usr'] = $_POST['username'];
    $user['fst'] = $_POST['first_name'];
    $user['lst'] = $_POST['last_name'];
    $user['pwd'] = $_POST['password'];


    $session->setMessage("The user {$user->usr} has been added");
    $user_service->save($user);
    header("Location: user.php");

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
                        Create User
                        <small>Subheading</small>
                    </h1>

                    <form action="" method="post">

                        <div class="col-md-6 col-md-offset-3">


                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control">

                            </div>


                            <div class="form-group">
                                <label for="first name">First Name</label>
                                <input type="text" name="first_name" class="form-control">

                            </div>

                            <div class="form-group">
                                <label for="last name">Last Name</label>
                                <input type="text" name="last_name" class="form-control">

                            </div>


                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control">

                            </div>

                            <div class="form-group">

                                <input type="submit" name="create" class="btn btn-primary pull-right">

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