<?php
include("includes/header.php");
require_once('scripts/bean/Photo.php');
require_once('scripts/service/impl/PhotoService.php');

$session = $session ?? null;
$photo_service = $photo_service ?? null;

if (!$session->isSignedIn()) header("Location: login.php");

if (!empty($_GET['id']) && $photo = $photo_service->findById($_GET['id'])) {
    if ($photo_service->del($photo))
        $session->setMessage("The {$photo->dir} has been deleted");
    else         $session->setMessage("The {$photo->dir} has not been deleted");
}
header("Location: photo.php");
