<!DOCTYPE html>
<html lang="en">
<head>
<script type = "text/javascript" >  
        function preventBack() { window.history.forward(); }  
        setTimeout("preventBack()", 0);  
        window.onunload = function () { null };  
    </script> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
  margin: 20px auto;
  max-width: 500px;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

input[type="text"],input[type="number"]{
  padding: 10px;
  border: 2px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-bottom: 20px;
  width: 100%;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

    </style>
</head>
<body>
<?php
// Connect to database
$conn = mysqli_connect('localhost', 'root', 'Pri@2004', 'hospital');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get mobile number from form input
$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);

// Check if mobile number exists in database
$sql = "SELECT * FROM patient WHERE p_contact = '$mobile'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	// Mobile number exists in database, redirect to next page
	
// Get the mobile number input from the user
$mobile_number = $_POST['mobile'];


// Query the database for the patient record with the given mobile number
$sql = "SELECT * FROM patient WHERE p_contact = '$mobile'";
$result = $conn->query($sql);

// Check if there is a record with the given mobile number
if ($result->num_rows > 0) {
  // Display the patient data in a form for editing
  $row = $result->fetch_assoc();
  $case_no = $row['case_no'];
  $patient_name = $row['p_name'];
  $patient_mobile_number = $row['p_contact'];
  $p_age = $row['p_age'];
  $p_gender = $row['p_gender'];
  $p_bloodgroup = $row['p_bloodgroup'];
  $patient_address = $row['p_city'];
  $patient_email = $row['email'];
  $meeting_with = $row['meeting_with'];

    echo "<form action='update_patient.php' method='post'>";
    echo "<label for='case_no'>Case No:</label>";
    echo "<input type='text' id='case_no' name='case_no' value='$case_no'><br>";
    echo "<label for='name'>Name:</label>";
    echo "<input type='text' id='name' name='name' value='$patient_name'><br>";
    echo "<label for='p_age'>Age:</label>";
    echo "<input type='number' id='p_age' name='p_age' value='$p_age'><br>";
    echo "<label for='gender'>Gender:</label>";
    echo "<input type='text' id='p_gender' name='p_gender' value='$p_gender'><br>";
    echo "<label for='mobile_number'>Mobile Number:</label>";
    echo "<input type='text' id='mobile_number' name='mobile_number' value='$patient_mobile_number' readonly><br>";
    echo "<label for='bloodgroup'>Blood Group:</label>";
    echo "<input type='text' id='p_bloodgroup' name='p_bloodgroup' value='$p_bloodgroup'><br>";
    echo "<label for='address'>city:</label>";
    echo "<input type='text' id='address' name='address' value='$patient_address'><br>";
    echo "<label for='email'>Email:</label>";
    echo "<input type='text' id='email' name='email' value='$patient_email'><br>";
    echo "<label for='meeting_with'>Meeting With:</label>";
    echo "<input type='text' id='meeting_with' name='meeting_with' value='$meeting_with'><br>";
    echo "<input type='submit' value='Update'>";
    echo "</form>";
} else {
  // Display an error message if no record is found with the given mobile number
  echo "No patient found with mobile number: $mobile";
}

// Close the database connection
$conn->close();

	exit();
} else {
	// Mobile number does not exist in database, redirect to another page
	header("Location: add_patient.php");
	exit();
}

// Close database connection
mysqli_close($conn);
?>
    
</body>
</html>




