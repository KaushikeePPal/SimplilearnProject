<html>
<head><title>Simplilearn Project</title></head>
<body>  
<h1>This is a test project</h1>
<!-- Draw the form -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <input type="submit"> 
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['fname'];
    if (empty($name)) {
        echo "Name is empty";
    } else {
        echo "";
    }
}
$servername = "localhost";
$username = "kaushikee";
$password = "test123";
$dbname = "simplilearnproject";


//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
    echo "";
}

//search for name
$sql = "SELECT FirstName, LastName FROM namesearch where LastName = '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<br> <br>" .$result->num_rows. "  matching names are found <br>";
    while($row = $result->fetch_assoc()) {        
        echo "<br> FirstName: ". $row["FirstName"]. " - LastName: ". $row["LastName"].  "<br>";      
    }
} else {
    echo "0 results";      
}


$conn->close();



?>


</body>    
</html>