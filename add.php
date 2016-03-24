<?php 
$servername = "localhost";
$username = "root";
$password = "3566";
$dbname = "practice";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    "<br>";
}
else{
 // echo "Connected to Database!!!!";

}


//prepare and bind
$stmt = $conn->prepare("INSERT INTO patrons (firstname,lastname,email) VALUES (?,?,?)");
$stmt->bind_param("sss",$firstname,$lastname,$email);


//Check First Name
if (isset($_REQUEST['submitted'])) {
    // Initialize error array.
    $errors = array();
  // Check for a proper name
  if (!empty($_REQUEST['firstname'])) {
     $firstname = $_REQUEST['firstname'];
      $pattern = "/^[a-zA-Z ]*$/";
      // This is a regular expression that checks if the name is valid characters
  if (preg_match($pattern,$firstname)){ 
    $firstname = $_REQUEST['firstname'];
  }
  else{ 
    $errors[] = 'Your Name can only contain A-Z or a-z .';
  }
  } 
else {
    $errors[] = 'You did not enter your first name.';
  }
  
  //Check Last Name

  if (!empty($_REQUEST['lastname'])) {
  $lastname = $_REQUEST['lastname'];
  $pattern = "/^[a-zA-Z ]*$/";// This is a regular expression that checks if the name is valid characters
  if (preg_match($pattern,$lastname)){ 
    $lastname = $_REQUEST['lastname'];
  }
  else{ $errors[] = 'Your Name can only contain A-Z or a-z .';
  }
  } else {
    $errors[] = 'You did not enter your last name.';
  }
  
  
  //Check for a valid email address
  if (!empty($_REQUEST['email'])) {
  $email = $_REQUEST['email'];
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ $email = $_REQUEST['email'];}
  //else{ $errors[] = 'Your Phone number can only be numbers.';}
  	} else {$errors[] = 'You did not enter your email address.';
		}


  
  }
  //End of validation 


/*if (isset($_REQUEST['submitted'])) {
  if (empty($errors)) { 
  $from = "www.feedthecityky.com"; //Site name
  // Change this to your email address you want to form sent to
  $to = "feedthecity@att.net"; 
  $subject = "Message from Feed the City Website ";
  
  $message = "
  Message from " . $name . "  
  Email: " . $email . "   
  Comment/Question: " . $comment ."";
  mail($to,$subject,$message,$from);

  }
}
*/

if (isset($_REQUEST['submitted'])) {
  if (empty($errors)) { 
    $stmt->execute();
  }
}

//*****************************************************************************************************************************
//******************************************************************************************************************************

$fname = $_POST['d_firstname'];
$lname = $_POST['d_lastname'];
$ID = $_POST['id'];
$sql= "DELETE FROM patrons WHERE id = ".$ID."";


if(isset($_REQUEST['delete'])) {
	$conn->query($sql);
    echo "deleted";
} 
else{ echo "fail";} 
	     			
					  

					
					  /*if (isset($_REQUEST['delete'])) {
						  if (empty($d_errors)) { 
						    $d_stmt->execute();
						  }
						}*/
					

//$stmt->close();
//$conn->close();

?>






<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Feed the City</title>
   		<meta name="viewport" content="width=device-width, initial-scale=1.0">   		
	  	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen" type:"text/css">
    	<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen" type:"text/css">
    	<link href='https://fonts.googleapis.com/css?family=Dancing+Script:700|Crimson+Text:700,400italic|PT+Serif:700,400italic' rel='stylesheet' type='text/css'>
    	<link href="css/mystyle.css" rel="stylesheet" media="screen" type:"text/css">	
    	

	</head> 
	<body>
		<!-- NAV BAR -->
	  <header class="navbar navbar-default ">
		<div class="container-fluid">
		  <div class="row">
		  	<div class="col-sm-3">
		  		<img class="img-responsive" id="logo" src="img/FTC.png" alt="Feed the City Logo">
		  	</div>
		  	<div class="col-sm-5">
          
		  		<a href="index.html"><h1>Feed The City, Inc.</h1></a>
			</div>

			<div class="col-sm-4" id="mission">
			  	<h2>Our mission is to feed and clothe the needy families of Louisville, KY and Southern Indiana.</h2>
			</div>
		  </div>
		</div>    	     
  		  
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          	<span class="icon-bar"></span>
           	<span class="icon-bar"></span>
          	<span class="icon-bar"></span>          
        </button>

  	  	<nav class="collapse navbar-collapse">
          <ul class="nav nav-pills">
            <li><a href="index.html" >HOME</a></li>
            <li><a href="about.html">ABOUT US</a></li>
            <li><a href="help.html" >VOLUNTEER</a></li>
			<li><a href="donate.html">DONATIONS</a></li>
    	    <li><a href="events.html">EVENTS</a></li>	
    	    <li><a href="contact.php" >CONTACT US</a></li>
          <li><a href="display.php" class="selected">DB</a></li>
    	  </ul>
        </nav>
  	  </header><!--  END NAV BAR -->
  		<div class="jumbotron">  
          <div class="container">
          	<div class="row">
          		<div class="col-sm-6">
					
          			  <h3>Enter names into Patrons Database</h3>
		              <br>
		              <form action="" method="post">
		                <label>First Name: <br />
		                <input name="firstname" type="text" /><br /></label>
		                <br><br>

                    <label>Last Name: <br />
                    <input name="lastname" type="text" /><br /></label>
                    <br><br>
		                
		                <label>Email: <br />
		                <input name="email" type="text" /><br /></label>
		                <br><br>

		               <!--  <label>Questions or Comments: <br />
		                  <textarea name="comment" rows="5" cols="40"></textarea>
		               
		                <br><br> -->
		                <br>
		                  
		                 </label>
		                 <br>
		                
		            <input class="btn btn-default pull-left" name="" type="reset" value="Reset Form" /> 
                    <input class="btn btn-default" name="submitted" type="submit" value="Submit" />
                    
		              </form>
		              <br>
                  <button class="btn btn-default"  type="button" href="display.php" id="list">Display List</button>
                  
		    
		        </div>
		        <div class="col-sm-6 hidden-xs pull-right">
			       <h3>Delete Entry</h3>
          			
          			 <form action="" method="post">
                    <label>First Name <br />
                    <input name="d_firstname" type="text" /><br /></label>
                    <label>Last Name <br />
                    <input name="d_lastname" type="text" /><br /></label>

                    <h3>OR</h3>
                    <br>
		                <label>ID <br />
		                <input name="id" type="text" /><br /></label>
		                <br><br>

                     		              
	     			<input name="delete" type="submit" value="Delete record" /> 

					                  
					  				  </div>
							    </div>    

							   


					      </div>  
					      

							 <?php

							  //Print Errors
							  if (isset($_REQUEST['submitted'])) {
							  // Print any error messages. 
							  if (!empty($errors)) { 
							  echo '<hr /><h4>The following occurred:</h4><ul>'; 
							  // Print each error. 
							  foreach ($errors as $msg) { echo '<li>'. $msg . '</li>';}
							  echo '</ul><h4>Your mail could not be sent due to input errors.</h4><hr />';}
							   else{echo '<hr /><h4 align="center">Your mail was sent. Thank you!</h4><hr />';
							 
							  /*echo "Message from " . $name . " " . $lastname . " <br />Email: ".$email." <br />";*/
							  /*echo $comment;*/
							  

							  }


							  }
							   //End of errors array



					      ?>


       <?php

       //Printing List

       if(isset($_REQUEST['display'])){
      $sql = "SELECT * FROM patrons";
      $result = $conn->query($sql);
      "<br>";
       echo "id"."  ". "First Name" . "  ". "Last Name". "<br>";


      if($result->num_rows > 0){
      //output data of each row
      while ($row = $result->fetch_assoc()) {
        echo "id:" . $row["id"]. " " . $row["firstname"]. " " . $row["lastname"]. "<br>";
      }

      }else {
      echo "0 results";
        }
      }


      ?>


   </div>
   		


    <footer>
    	<div class="container">

    		<div class= row>
    			<div class="col-sm-3">
    				<h4 class="text-center">(502)-772-5384</h4>

    			</div>

    			<div class="col-sm-6">
    				<h4 class="text-center">1100 South 26th Street, Louisville, KY 40210</h4>
    				
    			</div>

    			<div class="col-sm-3">
    				<h4 class="text-center">feedthecity@att.net</h4>

    			</div>
    		</div>
    		<div class="row">
     			<h6 class="text-center"><small >Background image courtesy of rakratchada torsap at FreeDigitalPhotos.net</small></h6>
    		</div>
    		
     	</div>  
    </footer>
    
	<script src="http://code.jquery.com/jquery.js"></script>
   	<script src="js/bootstrap.min.js"></script>
    <script src="js/display.js" type="text/javascript"></script>
   	
    	

	</body>


</html>