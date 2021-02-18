<?php
/** @noinspection PhpIncludeInspection */
require_once 'includes/Session.php';
require_once 'includes/header.php';
require_once 'scripts/UserService.php';

$session = $session ?? null;
$user_service = $user_service ?? null;

$usr = $pwd = '';
$message = $session->getMessage();

if ($session->isSignedIn())
    header('Location: index.php');

if (isset($_POST['usr'], $_POST['pwd'])) {

    $usr = trim($_POST['usr']);
    $pwd = $_POST['pwd'];
    $user = $user_service->GetInfo($usr, $pwd);
    if ($user) {
        $session->login($user);
        header("Location: index.php");
    } else {
        $session->setMessage('Username or Password are incorrect');
        header('Location: index.php');
    }
}
?>

<div class="col-md-4 col-md-offset-3">

    <h4 class="bg-danger"><?= $message ?></h4>

    <form id="login-id" action="" method="post">

        <div class="form-group">
            <label for="usr">Username</label>
            <input type="text" class="form-control" name="usr" value="<?= htmlentities($usr); ?>">

        </div>

        <div class="form-group">
            <label for="pwd">Password</label>
            <input type="password" class="form-control" name="pwd" value="<?= htmlentities($pwd); ?>">

        </div>


        <div class="form-group">
            <button class="btn btn-primary">Submit</button>

        </div>


    </form>

</div>
