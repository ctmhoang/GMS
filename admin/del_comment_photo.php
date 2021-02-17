<?php /** @noinspection PhpIncludeInspection */
include("includes/header.php");
require_once('includes/Session.php');
require_once('scripts/CommentService.php');

$session = $session ?? null;
$comment_service = $comment_service ?? null;

if (!$session->isSignedIn()) header("Location: login.php");

if (isset($_GET['id']) && $comment_service->isCommentWithIdExisted($id = $_GET['id'])) {
    $pid = $comment_service->get($id)->pid;
    $comment_service->deleteById($id);
    $session->setMessage("The comment with {$id} has been deleted");
    header("comment_photo.php?id=$pid");
}

header("Location: comment.php");
