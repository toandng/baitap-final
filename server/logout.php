<?php
    session_start();

    session_unset();
    session_destroy();

    header("Location: http://localhost/baitap-final/server/login.php")
?>