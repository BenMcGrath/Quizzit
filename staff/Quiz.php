<?php
    //On this page will do many different things depending on how they go to this page.
    session_start();
    //Need to get the Session ID 
    if (!isset($_SESSION['username']))
    {
        header ('Location: ../LoginGUI.php');
    }
    $username = $_SESSION['username'];

    //Connect to the Database
    $connect = mysql_connect("localhost", "webd_wt2user", "RD3%JgdAcI5!" ) or die("Couldn't connect");
    mysql_select_db("webd_wt2") or die ("Couldn't find Database");

    //Get The tutors details
    $query = mysql_query("SELECT * FROM Tutors WHERE Tutor_ID='$username' ");
    $tutDetails = mysql_fetch_array($query);
    //Get the Universtiy They are at

    //First get the ID in their account
    $tutUniID = $tutDetails['Universities'];

    //Now get the Name of that UNI
    $uniNameQuery =  mysql_query("SELECT * FROM Universities WHERE ID = '$tutUniID'");
    $uniName = mysql_fetch_array($uniNameQuery);

    //Need to get the Quizzes they have done


?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>Quizzes &middot; QuizzIt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px;
        }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
  </head>

  <body>
  
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
		 <a class="brand" href="StaffProfile.php">QuizzIt - 
				<?php 
					echo $uniName['Name'];
				?>
		  </a>
		  
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="StaffProfile.php">Profile</a></li>
              <li><a href="Modules.php">Modules</a></li>
              <li class="active"><a href="Quiz.php">Quizzes</a></li>
              <li><a href="#">Results</a></li>
              <li><a href="#">Notes</a></li>
              <li><a href="#">Trending</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
      <div class="hero-unit">
        <h1>
            Quizzes
        </h1>
        <p>
            On this page we need to show the quizzes the person has.
        </p>
        <!--Best way is to do it by a table-->

            <?php
                //Now we need to export the data into the table
                
                $sqlcountcheck = "SELECT * FROM Quizzes WHERE Tutor_ID = '$username'";
				$result = mysql_query($sqlcountcheck);
				if($result) {
                    if(mysql_num_rows($result) == 0) 
                    {
						echo "You have no Quizzes....<a href=\"Modules.php\">Make one?</a>";
					}
                    else 
                    {
                        ?>
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Quiz ID</th>
                              <th>Quiz Name</th>
                              <th>Live</th>
                              <th>Edit</th>
                              <th>Make Live/Close</th>
                              <th>View Results</th>
                            </tr>
                          </thead>
                          <!--<tbody>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>-->
            <?php
                        //We will do this with a while loop
                        while($Quizarray = mysql_fetch_array( $result ))
                        {
                            echo "<tr>";

                            echo "<td>". $Quizarray['ID'] ."</td>\n";
                            echo "<td>". $Quizarray['Name'] ."</td>\n";
                            echo "<td>". $Quizarray['Live'] ."</td>\n";
                            echo "<td>". "<a href=\"EditQuiz.php?qid=".$Quizarray['ID']."\">Edit</a>" ."</td>\n";
                            echo "<td>". "Make Live" ."</td>\n";
                            echo "<td>". "View Results" ."</td>\n";
                            


                            echo "</tr>";
                        }
                        ?>

                        </table>
<?php
                    }
                }
                else
                {
				    die("Query failed");
				}
                				
            ?>
        
        

      </div>
    </div>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>
    <script>
        $('.dropdown-toggle').dropdown()
    </script>
  </body>
</html>
