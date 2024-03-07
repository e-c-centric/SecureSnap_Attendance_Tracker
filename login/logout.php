<?php

include './../settings/config.php';
include './../settings/core.php';

if (is_logged_in()) {
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    session_destroy();

    header('Location: ./../index.php');
}

else {
    header('Location: ./../login/login.php');
}
