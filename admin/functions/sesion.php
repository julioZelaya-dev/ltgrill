<?php
function autenticated()
{
    if (!check_user()) {
        header('Location:login.php');
        exit();
    }
}

function check_user()
{
    return isset($_SESSION['user_name']);
}

session_start();
autenticated();
