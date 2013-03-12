<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- This will create a header for the webpage. -->

<?php
/*This is the registration page for my site, it will allow the user's to create and account for
 the common room.*/
session_start();
?>

<head>
	<title>The Common Room.</title>
	<!-- This links the CSS file which i have created to the webpage. -->
	<link rel="stylesheet" href="styles.css" type="text/css" >
</head>

<body>
	<!-- This is the body tag, this is where all the main bulk of my website will be written. -->
	<!-- This is the header div which can be found in the CSS file to see what it contains. -->
	<div id="Header">
		<!-- This is the logo for my website, the image can be found in the image file -->
		<img src="Images/Logo.png" alt="logo">
	</div>

	<!-- This is the NavBar div which is the navigation bar --> 
	<div id="NavBar">
		<!-- These are the buttons on the navigation bar -->
		<a href="index.html" class="navbar">Home</a>
		<a href="UserPage.php" class="navbar">User Page</a>
		<a href="About Us.html" class="navbar">About Us</a>
		<a href="ContactUs.html" class="navbar">Contact Us</a>
		<a href="register.php" class="navbar">Register</a>
		<a href="Tutorials.html" class="navbar">Tutorials</a>
	</div>
	
	<!-- This is the Main div, this will be the main visual on my webpage, it will contain the
	main bulk of information on the site. -->
	<div id="Main">

		<?php
		
			/* Here I declare the text boxes in my forms so that i am able to use them later on
			in my php which will make it easier when inputting data into my MySQL tables. */
			$submit = $_POST['submit'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$placeofstudy = $_POST['placeofstudy'];
			$age = $_POST['age'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$repeatpassword = $_POST['repeatpassword'];
			

			/* If the submit button is pressed the code below will run. */
			if ($submit)
			{
				
				/* If all fields have been filled in within the form the code below will execute. */
				if ($firstname&&$lastname&&$email&&$placeofstudy&&$age&&$username&&$password&&$repeatpassword)
					{
						?>
						
						<!-- This will out put the registration form. -->
										<br> <br> <h1>Registration.</h1>
						<br>
						<form action="register.php" method='POST'>
						<table> 
						<tr><td>First Name: </td><td><input type="text" name="firstname" value="<?php echo$firstname;?>"></td></tr>
						<tr><td>Last Name: </td><td><input type="text" name="lastname" value="<?php echo$lastname;?>"></td></tr>
						<tr><td>E-Mail Address: </td><td><input type="text" name="email" value="<?php echo$email;?>"></td></tr>
						<tr><td>Place of Study: </td><td><input type="text" name="placeofstudy" value="<?php echo$placeofstudy;?>"></td></tr>
						<tr><td>Age: </td><td><input type="text" name="age" value="<?php echo$age;?>"></td></tr>
						<tr><td>UserName: </td><td><input type="text" name="username" value="<?php echo$username;?>"></td></tr>
						<br>
						<tr><td>Password: </td><td><input type="password" name="password" ></td></tr>
						<tr><td>Repeat Password: </td><td><input type="password" name="repeatpassword" ></td></tr>
						</table>
						<p><INPUT type="submit" name='submit' value="Register">
						</p>
						</form>
						<!--This will out put a confirmation message -->
						<?php
						echo "All fields have been filled in.";
						
						/* This will allow the page to connect to my database. */
						$connect = mysql_connect("localhost", "u11206615", "makingdon" );
						mysql_select_db("u11206615", $connect);
						
						/*This will insert what the user has put in the form into the "users" table*/
						$query = mysql_query
						("
						INSERT INTO users VALUES ('','$username','$password','$email','$firstname','$lastname','$age','$placeofstudy')
						");
						
						/*Once the information has been written to the table you will then be taken 
						to a blank confirmation page. */
						die("You have been registered! <a href='UserPage.php'> Return to User's Page. </a>");
					}
				
					/*If all fields haven't been filled in the code below will be excuted. */
				else 
					
					{	
						?>
						
						<!-- This will output the registration form. -->
									<br> <br> <h1>Registration.</h1>
						<br>
						<form action="register.php" method='POST'>
						<table> 
						<tr><td>First Name: </td><td><input type="text" name="firstname" value="<?php echo$firstname;?>"></td></tr>
						<tr><td>Last Name: </td><td><input type="text" name="lastname" value="<?php echo$lastname;?>"></td></tr>
						<tr><td>E-Mail Address: </td><td><input type="text" name="email" value="<?php echo$email;?>"></td></tr>
						<tr><td>Place of Study: </td><td><input type="text" name="placeofstudy" value="<?php echo$placeofstudy;?>"></td></tr>
						<tr><td>Age: </td><td><input type="text" name="age" value="<?php echo$age;?>"></td></tr>
						<tr><td>UserName: </td><td><input type="text" name="username" value="<?php echo$username;?>"></td></tr>
						<br>
						<tr><td>Password: </td><td><input type="password" name="password" ></td></tr>
						<tr><td>Repeat Password: </td><td><input type="password" name="repeatpassword" ></td></tr>
						</table>
						<p><INPUT type="submit" name='submit' value="Register">
						</p>
						</form>
						<?php
						/* This will out put an error message for the user. */
						echo"All fields have not been filled in.";
						}
				
				/*If the password and repeated password match the code below will be 
				executed. */
				if ($password==$repeatpassword)
					{
				
						/*If the username, firstname, last name are greater than 25 characters and 
						the e-mail address and place of study are greater than 40 characters the 
						code below will be executed. */
						if (strlen($username)>25||strlen($firstname)>25||strlen($lastname)>25||strlen($email)>40||strlen($placeofstudy)>40)
						{
							?>
							
							<!-- This will output the registration form. -->
											<br> <br> <h1>Registration.</h1>
							<br>
							<form action="register.php" method='POST'>
							<table> 
							<tr><td>First Name: </td><td><input type="text" name="firstname" value="<?php echo$firstname;?>"></td></tr>
							<tr><td>Last Name: </td><td><input type="text" name="lastname" value="<?php echo$lastname;?>"></td></tr>
							<tr><td>E-Mail Address: </td><td><input type="text" name="email" value="<?php echo$email;?>"></td></tr>
							<tr><td>Place of Study: </td><td><input type="text" name="placeofstudy" value="<?php echo$placeofstudy;?>"></td></tr>
							<tr><td>Age: </td><td><input type="text" name="age" value="<?php echo$age;?>"></td></tr>
							<tr><td>UserName: </td><td><input type="text" name="username" value="<?php echo$username;?>"></td></tr>
							<br>
							<tr><td>Password: </td><td><input type="password" name="password" ></td></tr>
							<tr><td>Repeat Password: </td><td><input type="password" name="repeatpassword" ></td></tr>
							</table>
							<p><INPUT type="submit" name='submit' value="Register">
							</p>
							</form>
							<!-- This will output and informational message to help the user correct
							what ever has gone wrong. -->
							<?php
							echo"The Username, Firstname and Lastname fields must be shorter than 25 and the E-Mail and Place of Study fields must be less than 40 Characters.";
						}
					}
			
				/*If the username, firstname, last name aren't greater than 25 characters and 
				the e-mail address and place of study aren't greater than 40 characters the 
				code below will be executed. */
				else
						{
				
							/*If the password is greater than 25 and less than 6 the code below will
							be executed. */
							if  (strlen($password)>25||strlen($password)<6)
							{
								?>
								
								<!--This will output the registration form. -->
												<br> <br> <h1>Registration.</h1>
								<br>
								<form action="register.php" method='POST'>
								<table> 
								<tr><td>First Name: </td><td><input type="text" name="firstname" value="<?php echo$firstname;?>"></td></tr>
								<tr><td>Last Name: </td><td><input type="text" name="lastname" value="<?php echo$lastname;?>"></td></tr>
								<tr><td>E-Mail Address: </td><td><input type="text" name="email" value="<?php echo$email;?>"></td></tr>
								<tr><td>Place of Study: </td><td><input type="text" name="placeofstudy" value="<?php echo$placeofstudy;?>"></td></tr>
								<tr><td>Age: </td><td><input type="text" name="age" value="<?php echo$age;?>"></td></tr>
								<tr><td>UserName: </td><td><input type="text" name="username" value="<?php echo$username;?>"></td></tr>
								<br>
								<tr><td>Password: </td><td><input type="password" name="password" ></td></tr>
								<tr><td>Repeat Password: </td><td><input type="password" name="repeatpassword" ></td></tr>
								</table>
								<p><INPUT type="submit" name='submit' value="Register">
								</p>
								</form>
								<!-- this will output a helpful message which will allow the user to 
								ammend his form so that a user account can be created. -->
								<?php
								echo"Your password must be between 6 & 25 characters.";
							}
								
						}

				
				
			}
			
			/* If the password and the repeated password are not the same the code below 
			will be excuted. */
			else 
			{	
				?>
				
				<!-- This will show the registration form -->
				<br> <br> <h1>Registration.</h1>
				<br>
				<form action="register.php" method='POST'>
				<table> 
				<tr><td>First Name: </td><td><input type="text" name="firstname" value="<?php echo$firstname;?>"></td></tr>
				<tr><td>Last Name: </td><td><input type="text" name="lastname" value="<?php echo$lastname;?>"></td></tr>
				<tr><td>E-Mail Address: </td><td><input type="text" name="email" value="<?php echo$email;?>"></td></tr>
				<tr><td>Place of Study: </td><td><input type="text" name="placeofstudy" value="<?php echo$placeofstudy;?>"></td></tr>
				<tr><td>Age: </td><td><input type="text" name="age" value="<?php echo$age;?>"></td></tr>
				<tr><td>UserName: </td><td><input type="text" name="username" value="<?php echo$username;?>"></td></tr>
				
				<tr><td>Password: </td><td><input type="password" name="password" ></td></tr>
				<tr><td>Repeat Password: </td><td><input type="password" name="repeatpassword" ></td></tr>
				</table>
				<p><INPUT type="submit" name='submit' value="Register">
				</p>
				</form>
				<!-- this will output a helpful message which will allow the user to 
				ammend his form so that a user account can be created. -->
				<?php
				echo"Your passwords do not match.";
			}
			?>
	</div>
	
	<!-- The Login div is left blank as i don't want people to be able to log in on the 
	registration page. -->
	<div id="LogIn">

	</div>



</body>
</html>