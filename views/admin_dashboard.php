<?php

include './../settings/core.php';

if (!is_logged_in()) {
    header('Location: ./../login/login.php');
} ?>

    <?php

    include './../admin/register_all_students.php';

    ?>