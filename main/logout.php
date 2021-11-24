<?php

if(!isset($_SESSION)) {

    session_start();

}

session_destroy();

@$id = $_GET["id"];
$id = "inicio";
include $pg[$id];
?>