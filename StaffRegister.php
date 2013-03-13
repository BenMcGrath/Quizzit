<?php
    //This page will get the values put in the Staff Register page and check them and if correct put them into the database.

    //first need to get all the information that would have been sent in the POSt method.
    $Tutor_ID = $_POST['tutor_ID'];
	$submit = $_POST['submit'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repeatpassword = $_POST['repeatpassword'];
?>
