<?php

require_once 'scripts/utils/Session.php';

$session = $session ?? null;
$session->logout();
header("Location: login.php");