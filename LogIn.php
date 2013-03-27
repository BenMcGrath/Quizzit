
<?php
/* This piece of code allows the user to log into the website using php and MySQL. */



/*I have assigned the value two text boxes "username" and "password" to $username and 
$password.*/

/*Rename the appropiate log in boxes in Embo's Login.HTML to allow the assigning of variable*/
$username = $_POST['username'];
$password = $_POST['password'];


if ($username && $password)
{

/*This connects to the MySQL database "users".*/

/*Check appropiate data to insure that the php file can connect to the SQL server.*/
$connect = mysql_connect("localhost", "webd_wt2user", "RD3%JgdAcI5!" ) or die("Couldn't connect");
mysql_select_db("webd_wt2") or die ("Couldn't find Database");

/*This selects the row from the table "users" where the user name field is equal to 
"$username".*/
$query = mysql_query("SELECT * FROM Tutors WHERE Tutor_ID='$username' ");
/*This counts the number of rows within the database.*/
$numrows = mysql_num_rows($query);

	/*If $username is equal to the user field within the table the following piece of code will 
	be out put.*/
	if ($numrows != 0)
		{
		
		/*This will search the tables data to find the correct username and password, once 
		they have been found they will be assinged the values $dbusername and 
		$dbpassword.*/
		while ($row = mysql_fetch_assoc($query))
			{
				$dbusername = $row['Tutor_ID'];
				$dbpassword = $row['Password'];
			}

		/*If the username and password are equal too "Admin" and "password33" then you 
		will be redirected to the phpmyadmin page.*/
		
		/*This is the Admin account feature, it will allow the Admin to log into the server with special privlidges.*/
		
		if ( $username == admin && $password == password33)
			{
			echo "you're in! <a href='http://www.webdesign.lincoln.ac.uk/wt2/phpMyAdmin.php'>Click</a> here to enter the members page.";
			exit;
			}

		else
			
			{
			
				/*If the username and password are not equal to that but the username and 
				password can be found within the table the following code will be performed.*/			
				
				/*Insert the appropiate data to ensure the message is customiseable.*/
				if ($username == $dbusername && $password==$dbpassword)
					{
						echo "you're in! <a href='UserPage.php'>Click</a> here to enter the members page.";
						$_SESSION['username']=$dbusername;
					}
				
				else 
				
				/*If the username and password aren't equal to that in the data base it will output 
				"incorrect password" the reason for this is that the username would of already 
				been correct as this if statement needs a valid username to search the table.*/	
					echo "incorrect password!";
			
				}	
			}

	/*If the username cannot be found within the table the message "thats user doesnt exist"
	and then kill this process.*/
	else
		die("That user doesn't exist.");

}	

/*If the username and password fields are empty then this message appears.*/
else
	die("Please enter a username and password");
	
?>
