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

            //Check the Username/Tutor_Id is Unquie 

            //Check by seeing if it find any usernames the same


            //if the Username/tutor_ID is unique them continue. 
            //If not send back to form ask them to choose another one.
            

                //check the Passwords are the same!
                if($password==$repeatpassword)
                {
                    //If the Passwwords are the same

                

                }
                else
                {
                    //If the Passwords are different

                    //Send them back to the form and have them fill it back out with the correct passwords this time

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


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Staff registration &middot; QuizzIt</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!--[if lt IE 9]>
          <script src="assets/js/html5shiv.js"></script>
        <![endif]-->

        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
            }

            .form-register {
                max-width: 400px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }

            .form-register .form-register-heading, .form-register .checkbox {
                margin-bottom: 10px;
            }

            .form-register input[type="text"], .form-register input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
            }
        </style>
        <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
          <form method="POST" onsubmit="validateForm(this);" class="form-register">
            <h2 class="form-register-heading">Staff registration</h2>
            <p>Please fill in the fields below to create an account.</p>
            <input type="text" class="input-block-level required" name="Tutor_ID" id="Tutor_ID" required="required" rel="popover" data-content="Please enter your ID" placeholder="Tutor ID">
            <input type="text" class="input-block-level required" name="email" id="email" required="required" rel="popover" data-content="Please enter your email address" placeholder="Email">
            <input type="text" class="input-block-level required" name="firstName" id="firstName" required="required" rel="popover" data-content="Please enter your first name" placeholder="First Name">
            <input type="text" class="input-block-level required" name="lastName" id="lastName" required="required" rel="popover" data-content="Please enter your last name" placeholder="Last Name">
            <input type="text" class="input-block-level required" name="university" id="university" required="required" rel"popover" data-content="Please enter your university" placeholder="University">
            <input type="password" class="input-block-level required" name="password" id="password" required="required" rel="popover" data-content="Please enter a password" placeholder="Password">
            <input type="password" class="input-block-level required" name="confirmPassword" id="confirmPassword" required="required" rel="popover" data-content="The passwords do not match" placeholder="Confirm Password">
            <p>A validation email will be sent to the email address you provide. This is required to activate your account.</p>
            <button class="btn btn-large btn-primary" name="submit" id="submit" type="submit">Register</button>
            <a href="Default.html" style="margin-left: 5px;" class="btn btn-large">Back to HomePage</a>
          </form>
        </div>
      <script src="http://code.jquery.com/jquery.js"></script>
      <script src="assets/js/bootstrap.js"></script>
      <script src="assets/js/jquery.js"></script>
      <script src="assets/js/bootstrap-transition.js"></script>
      <script src="assets/js/bootstrap-alert.js"></script>
      <script src="assets/js/bootstrap-modal.js"></script>
      <script src="assets/js/bootstrap-dropdown.js"></script>
      <script src="assets/js/bootstrap-scrollspy.js"></script>
      <script src="assets/js/bootstrap-tab.js"></script>
      <script src="assets/js/bootstrap-tooltip.js"></script>
      <script src="assets/js/bootstrap-popover.js"></script>
      <script src="assets/js/bootstrap-button.js"></script>
      <script src="assets/js/bootstrap-collapse.js"></script>
      <script src="assets/js/bootstrap-carousel.js"></script>
      <script src="assets/js/bootstrap-typeahead.js"></script>
    </body>
</html>