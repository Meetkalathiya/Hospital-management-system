<!DOCTYPE html>
<html>
<head>
<script type = "text/javascript" >  
		function preventBack() { window.history.forward(); }  
		setTimeout("preventBack()", 0);  
		window.onunload = function () { null };  
	</script> 
  <title>Edit Table</title>
  <style>
    form {
      display: inline-block;
      margin: 20px;
    }
    label {
      display: block;
      margin-bottom: 5px;
    }
    input[type=text] {
      width: 200px;
      padding: 5px;
      margin-bottom: 10px;
    }
    input[type=submit] {
      padding: 5px 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    a {
			background-color: #4CAF50;
			border: none;
			color: white;
			padding: 10px 20px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin:50px;
			cursor: pointer;
		}
  </style>
</head>
<body>
  <h1>Edit Table</h1>
  <?php
    // Connect to the database
    $host = "localhost";
    $username = "root";
    $password = "Pri@2004";
    $dbname = "hospital";

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$case_no = $_GET["case_no"];
$sql = "SELECT * FROM patient WHERE case_no = $case_no";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $prescription = $_POST["prescription"];

  // Update the database
  $sql = "UPDATE patient SET prescription = '$prescription' WHERE case_no = $case_no";
  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    echo '<a href="appoinment_data.php">View data</a>';
  } else {
    echo "Error updating record: " . $conn->error;
  }
}

// Close the database connection
$conn->close();
?>

  <form method="post">
    <label for="prescription">Prescription:</label>
    <!-- <input type="text" id="prescription" name="prescription" > -->
   <textarea name="prescription" id="prescription" cols="30" rows="10" value="<?php echo $row["prescription"]; ?>"></textarea>
    <input type="submit" name="submit" value="Update">
  </form>
</body>
</html>