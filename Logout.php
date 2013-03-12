<?php
/*This piece of script log the user out by killing the existing session.*/
session_start();
session_destroy();
echo "You have been logged out. To return to the home click  <a href='UserPage.php'>here</a>";
?>