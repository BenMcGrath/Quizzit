<?php
/*This piece of script log the user out by killing the existing session.*/
session_start();
session_destroy();
header ('Location: Default.php');
?>