<?php
    header('Location: ' . $_SERVER['HTTP_REFERER']);

    session_start();

    session_destroy();
?>