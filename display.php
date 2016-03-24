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
 // echo "Connected to Database!!!!". "<br>". "<br>";

}


/*$sql = "SELECT * FROM patrons";
 $result = $conn->query($sql);
      "<br>";
       echo "id"."   ". "First Name" . "   ". "Last Name". "<br>";


      if($result->num_rows > 0){
      //output data of each row
      while ($row = $result->fetch_assoc()) {
        echo $row["id"]. "  " . $row["firstname"]. "  " . $row["lastname"]. "<br>". "<br>";
      }

      }else {
      echo "0 results";
        }
      */

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
          	<?php
          		$sql = "SELECT * FROM patrons";
 				$result = $conn->query($sql);

			echo '<table style="width:50%">';
			    echo '<tr>';
			        echo '<th>ID</th>';
			        echo '<th>First Name</th>';
			        echo '<th>Last Name</th>';
			        echo '<th>Email Address</th>';
			       // echo '<td>Price</td>';
			        //echo '<td>Total</td>';
			    echo '</tr>';
			while ($row = $result->fetch_assoc())
			{
			    echo '<tr>';
			    echo '<td>'.$row["id"].'</td>';
			    echo '<td>'.$row["firstname"].'</td>';
			    echo '<td>'.$row["lastname"].'</td>';
			    echo '<td>'.$row["email"].'</td>';
			    print '</tr>';
			}
			echo '</table>';  
			?> 

          </div>
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