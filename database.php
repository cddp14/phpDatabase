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
}
else{
	echo "Connected to Database";

}

/*//Create database
$sql = "CREATE TABLE MyGuest(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
reg_date TIMESTAMP)";

if($conn->query($sql)===TRUE){
	echo "Table Successfully created";
}
else{
	echo "Error creating database:" . $conn->error;
}*/

/*$sql = "INSERT INTO MyGuest (firstname,lastname) VALUES ('James', 'Taylor')";

if($conn->query($sql)===TRUE){
	echo "Entry Successfully created";
}
else{
	echo "No Data Entered (1):" . $conn->error;
}*/


/*$sql = "INSERT INTO MyGuest (firstname,lastname) VALUES ('Alvin', 'Robertson')";

if($conn->query($sql) === TRUE){
	echo "New Data Entered";
}

else{
	echo "No data entered (2):" . $conn->error;
}*/
echo "<br>";

$name = $_POST['name']; 
$sql= "DELETE FROM patrons where firstname = '".$name."'"; 

if(isset($_REQUEST['Submit'])) {
	$conn->query($sql);
    echo "deleted";
} 
else{ echo "fail";} 

//$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pratice</title>
</head>
<body>
	<form action="" method="post"> 
	<label>Name: <br/>
	<input name="name" type="text" /></label> 
	<input name="Submit" type="submit" value="delete record" /> 
	</form> 
</body>
</html>