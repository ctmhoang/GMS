<?php
/** @noinspection PhpIncludeInspection */
require_once 'includes/Session.php';
require_once 'scripts/UserService.php';

$session = $session ?? null;
$user_service = $user_service ?? null;

$message = $usr = $pwd = '';
if ($session->isSignedIn()) {
    header('Location: index.php');
}
if (isset($_POST['submit'])) {
    $usr = trim($_POST['usr']);
    $pwd = $_POST['pwd'];
    $user = $user_service->GetInfo($usr,$pwd);
    if ($user) {
        $session->login($user);
        header("Location: index.php");
    } else {
        $message = 'Username and Password are incorrect';
    }
} ?>

<div class="col-md-4 col-md-offset-3">

    <h4 class="bg-danger"><?= $message ?></h4>

    <form id="login-id" action="" method="post">

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?= htmlentities($usr); ?>">

        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?= htmlentities($pwd); ?>">

        </div>


        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">

        </div>


    </form>


</div>
