<?php
include("includes/header.php");
require_once('includes/Session.php');
require_once('scripts/Photo.php');
require_once('scripts/PhotoService.php');

$session = $session ?? null;
$photo_service = $photo_service ?? null;

if (empty($_GET['id'])) {

    redirect("photos.php");


}

$photo = $photo_service->findById($_GET['id']);

if ($photo) {

    $photo_service->del();
    $session->setMessage("The {$photo->name} has been deleted");
    header("Location: photos.php");

} else {
    header("Location: photos.php");
}


?>