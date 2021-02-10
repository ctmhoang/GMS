<?php /** @noinspection PhpIncludeInspection */
require_once 'includes/Session.php';
require_once 'includes/header.php';
require_once 'scripts/UserService.php';

$session = $session ?? null;
$user_service = $user_service ?? null;

$message = $session->getMessage();


if (empty($_GET['id'])) {

    header("Location: user.php");

}

$user = $user_service->findById($_GET['id']);


if (isset($_POST['update'])) {


    if ($user) {

        $data = [
            'usr' => $_POST['username'] ?? $user->usr,
            'fst' => $_POST['first_name'] ?? $user->fst,
            'lst' => $_POST['last_name'] ?? $user->lst,
            'pwd' => $_POST['password'] ?? $user->pwd
        ];


        $user_service->save($data, $user->id);
        header("Location: user.php");
        $session->setMessage("The user has been updated");


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
                        users
                        <small>Subheading</small>
                    </h1>


                    <form action="" method="post">


                        <div class="col-md-6">


                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control"
                                       value="<?php echo $user->username; ?>">

                            </div>


                            <div class="form-group">
                                <label for="first name">First Name</label>
                                <input type="text" name="first_name" class="form-control"
                                       value="<?php echo $user->first_name; ?>">

                            </div>

                            <div class="form-group">
                                <label for="last name">Last Name</label>
                                <input type="text" name="last_name" class="form-control"
                                       value="<?php echo $user->last_name; ?>">

                            </div>


                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control"
                                       value="<?php echo $user->password; ?>">

                            </div>

                            <div class="form-group">

                                <a id="user-id" class="btn btn-danger"
                                   href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>

                                <input type="submit" name="update" class="btn btn-primary pull-right" value="Update">

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