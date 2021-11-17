<?php
session_unset();
session_destroy();

@$id = $_GET["id"];
$id = "inicio";
include $pg[$id];
?>