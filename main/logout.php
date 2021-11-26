<?php

if(!isset($_SESSION)) {

    session_start();

}

session_destroy();

include 'loginPage.php';
?>