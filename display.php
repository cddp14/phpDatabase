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
  echo "Connected to Database!!!!";

}

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
      

?>