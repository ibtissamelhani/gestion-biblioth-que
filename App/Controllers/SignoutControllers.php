<?php

session_start();

class SignOutController
{
    public function signOut()
    {
        $_SESSION = array();

        session_destroy();

        header("Location: ../../index.php");
        exit();
    }
}

$signOutController = new SignOutController();

$signOutController->signOut();

?>