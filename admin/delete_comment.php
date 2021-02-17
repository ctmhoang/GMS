<?php
include("includes/header.php");
require_once('includes/Session.php');
require_once('scripts/CommentService.php');

$session = $session ?? null;
$comment_service = $comment_service ?? null;


if (isset($_GET['id']) && $comment_service->isCommentWithIdExisted($_GET['id'])) {
    $id = $_GET['id'];

    $comment_service->deleteById($id);
    $session->setMessage("The comment with {$id} has been deleted");
};
header("Location: comment.php");
