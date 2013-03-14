<?php
    //This page will get the values put in the Staff Register page and check them and if correct put them into the database.

    //first need to get all the information that would have been sent in the POSt method.
    $Tutor_ID = $_POST['tutor_ID'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repeatpassword = $_POST['repeatpassword'];
    $submit = $_POST['submit'];

    //check the submit button has been pushed
    if ($submit)
    {
        //if it has run this code

        //First are all fields filled in
        if ($Tutor_ID&&$firstname&&$lastname&&$email&&$password&&$repeatpassword)
        {
            //All fields have been filed in!

            //check the Passwords are the same!
            if($password==$repeatpassword)
            {
                //If the Passwwords are the same

            }
            else
            {
                //If the Passwords are different


            }            

            //Submit the data to the database

        }
        else
        {
            //A field has not been filled in! 

            //Send the form back to the user to get them to fill it in again.

        }

        //If yes check the passwords match. If not send them back to try again.



        //Check the username is unique first!

        //Everything about is correct put all the data into the database.
    }
    else
    {
        //If not they have hit this page by mistake send them back to the correct form
        header('Location: StaffRegister.html');
    }
?>
