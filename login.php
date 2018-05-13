<?php
session_start();

include "config.php";

if (isset($_POST['user']) && isset($_POST['pass'])) {

    foreach($authArray as $x => $x_value) {
        if ($x == $_POST['user']) {
            if (password_verify($_POST['pass'], $x_value)) {
                $_SESSION['login'] = true;
                $_SESSION['user'] = $x;
                header("Location: index.php");
            }
        }
    }
    if ( $_SESSION['login'] == false) {
        //if no right key was found, it just comes here and executes that code
        header("Location: login.html");
    }
}