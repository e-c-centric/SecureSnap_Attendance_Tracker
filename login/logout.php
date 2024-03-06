<?php

session_start();

include './../settings/config.php';
include './../settings/core.php';

if (is_logged_in()) {
    session_destroy();
    unset($_SESSION['email']);
    header('Location: ./../index.php');
}
?>