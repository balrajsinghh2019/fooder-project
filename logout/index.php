<?php
	require dirname(__FILE__, 2).'\const.php';
	require '../views/header.php';

    // Logout form handler.
    // if (!empty($_POST)) {
        unset($_SESSION["_user"]);
        unset($_COOKIE["_user"]);
        // check if user created then redirect to homepage
        if (empty($_SESSION["_user"]) && empty($_COOKIE["_user"]))
            header("Location: {$baseURL}");
    // }