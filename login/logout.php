<?php

include '../settings/core.php';

if (isset($_SESSION['email'])) {
    $_SESSION = array();
    header('Location: ../index.php');
} else {
    header('Location: ../index.php');
}
