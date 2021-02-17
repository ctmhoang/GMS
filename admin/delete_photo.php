<?php
include("includes/header.php");
require_once('includes/Session.php');
require_once('scripts/Photo.php');
require_once('scripts/PhotoService.php');

$session = $session ?? null;
$photo_service = $photo_service ?? null;

if (!$session->isSignedIn()) header("Location: login.php");

if (!empty($_GET['id']) && $photo = $photo_service->findById($_GET['id'])) {
    if ($photo_service->del($photo))
        $session->setMessage("The {$photo->path} has been deleted");
    else         $session->setMessage("The {$photo->path} has not been deleted");
}
header("Location: photo.php");
