<?php
include("includes/header.php");
require_once('scripts/service/impl/CommentService.php');

$session = $session ?? null;
$comment_service = $comment_service ?? null;

if (!$session->isSignedIn()) header("Location: login.php");


if (isset($_GET['id']) && $comment_service->isCommentWithIdExisted($_GET['id'])) {
    $id = $_GET['id'];

    $comment_service->deleteById($id);
    $session->setMessage("The comment with {$id} has been deleted");
};
header("Location: comment.php");
