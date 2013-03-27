<?php
//This file will allow the tutors to register to Quizzit
    //Functions!!!!!!!!!!!!!!!!!!!!!!
    //Connet to the database 
    function connectToDatabase()
    {
        $con = mysql_connect('localhost', 'webd_wt2user', 'RD3%JgdAcI5!');

        if(!$con) 
        {
            die('Failed to connect to server: ' . mysql_error());
        }
        $db = mysql_select_db(webd_wt2, $con);
        if(!$db)        {
            die("Unable to select database");
        }
    }
    if (isset($_POST['submit']))
    {
        // the form has been submitted//Before what the user has submitted is put in to the database we need to check it all okay and follows everything said//First check all forms have been filled in
        if ( isset($_POST['tutor_ID']) && isset($_POST['firstName']) && isset($_POST['lastName'])  && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword']) )
        {    
                //First get all the information from any post methods
    $Tutor_ID = $_POST['tutor_ID'];
	$firstName = $_POST['firstName'];
    $uniID = $_POST['Uni_ID'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repeatpassword = $_POST['confirmPassword'];
            //Yes all forms have been filled in
            connectToDatabase();
            //Now need to check the Tutors username is not already in the database.
            $Tutorcheck = "SELECT * FROM Tutors Where Tutor_ID='$Tutor_ID' ";
            $result=mysql_query($Tutorcheck);


            if($result) {
                if(mysql_num_rows($result) == 1) 
                {
                    //username already in use show form to allow them to re add their data
                    echo "Username Already in Use";

                }
                else 
                {
                    //Username is free now check passwords are the same.

                    if ($password == $repeatpassword)
                    {
                        //Passwords are the same add the data to the database
                        $addTutor = "INSERT INTO Tutors (Tutor_ID, Universities, FirstName, LastName, Password, Email) VALUES ('$Tutor_ID', '$uniID', '$firstName', '$lastName', '$password', '$email')";
                        if (!mysql_query($addTutor))
                        {
                            die('Error: ' . mysql_error());
                        }
                        else
                        {
                            echo "Welcome to Quizit"; 
                        }
                    }
                    else
                    {
                        //Passwords are differen
                        echo "Passwords are different";
                    }
                    
                }
            }else {
            die("Query failed");
            }


        }
        else
        {
            //No not all forma have been filled in. 
            echo "Not all forms are filled in";

        }

        
    }
    else
    {
        //If the form has not be submitted
        //Show the form to allow the tutor to fill it in.

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
          <form method="post" onsubmit="validateForm(this);" class="form-register" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h2 class="form-register-heading">Staff registration</h2>
            <p>Please fill in the fields below to create an account.</p>
            <input type="text" class="input-block-level required" name="tutor_ID" id="tutor_ID" required="required" rel="popover" data-content="Please enter your ID" placeholder="Tutor ID">
            <input type="text" class="input-block-level required" name="email" id="email" required="required" rel="popover" data-content="Please enter your email address" placeholder="Email">
            <input type="text" class="input-block-level required" name="firstName" id="firstName" required="required" rel="popover" data-content="Please enter your first name" placeholder="First Name">
            <input type="text" class="input-block-level required" name="lastName" id="lastName" required="required" rel="popover" data-content="Please enter your last name" placeholder="Last Name">
            <select name="Uni_ID">
            <?php
                //need to add the code that shows all the univertsy in the system
                //do it by a list format
                //connect to the database.
                connectToDatabase();


                $universities = mysql_query("SELECT * FROM Universities ORDER BY Name");
                    
                while( $myArray = mysql_fetch_array( $universities ) )
                {
                    echo "<option value=\"". $myArray['ID'] . "\">" . $myArray['Name'] . "</option> \r\n"  ;
                }
                //<input type="text" class="input-block-level required" name="university" id="university" required="required" rel"popover" data-content="Please enter your university" placeholder="University">

            ?>
            </select>
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
<?php


    }
?>