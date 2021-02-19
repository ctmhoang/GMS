<?php
/** @noinspection PhpIncludeInspection */
require_once 'includes/header.php';
require_once 'scripts/UserService.php';

$user_service = $user_service ?? null;

if (!$session->isSignedIn()) header("Location: login.php");

$message = $session->getMessage();


if (isset($_GET['id'])) {

    $user = $user_service->findById($_GET['id']);

    if ($user && $user_service->del($user))
        $session->setMessage("The {$user->username} user has been deleted");
}

header("Location: user.php");
