<?php
/** @noinspection PhpIncludeInspection */
require_once 'includes/Session.php';

$session = $session ?? null;
$session->logout();
header("Location: login.php");