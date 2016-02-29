 <?php
$servername = "localhost";
$username = "root";
$password = "3566";
$dbname = "myDB";

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


$sql = "SELECT * FROM MyGuest";
$result = $conn->query($sql);

if($result->num_rows > 0){
	//output data of each row
	while ($row = $result->fetch_assoc()) {
		echo "id:" . $row["id"]. " " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	}

}else {
	echo "0 results";
}

$conn->close();
?>
