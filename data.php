<html>
<head>
  <title>My Personalized Page</title>
  <style>
    body {
        font-family: sans-serif;
        background-color: skyblue;
    }
    h1 {
        text-align: center;
        color:green;
        font-size: 45px;
        margin: 0;
        padding: 20px;
    
    }
    h2 {
        text-align: center;
        color:blue;
        font-size: 35px;
        margin: 0;
        padding: 20px;
    }
    p{
        text-align: center;
        color:blue;
        font-size: 25px;
        margin: 0;
        padding: 20px;
    }
    li{
        color:blue;
        list-style: none;
        font-size: 25px;
        margin: 0;
        padding: 15px;
    }
    strong{
      color:green;
    }
  
    footer {
    background-color: green;
    text-align: center;
}

  </style>
</head>
<body>

<?php
//connect to database
$host = "localhost";
$username = "root";
$password = "Pri@2004";
$dbname = "hospital";

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//get user's name from login form
$mobile = $_POST['mobile'];


//query to join the two tables
$sql = "SELECT patient.p_name, patient.p_city,patient.p_contact,patient.p_age,patient.p_bloodgroup,patient.case_no,patient.p_gender,meeting_with,patient.prescription FROM patient where p_contact='$mobile'";

$result = $conn->query($sql);

//check if the query returned any rows
if ($result->num_rows > 0) {
    //output data of each row
    while($row = $result->fetch_assoc()) {

    echo "<h1> PATIENT PORTAL</h1>";
    echo "<h2>Welcome, " . $row["p_name"] . "!</h2>";
    echo "<p>This is your personal portal. Here's some information about you:</p>";
    echo "<ul>";
    echo "<li><strong>Case no:</strong> " . $row["case_no"] . "</li>";
    echo "<li><strong>Patient age:</strong> " . $row["p_age"] . "</li>";
    echo "<li><strong>Blood group:</strong> " . $row["p_bloodgroup"] . "</li>";
    echo "<li><strong>gender:</strong> " . $row["p_gender"] . "</li>";
    echo "<li><strong>Contact no:</strong> " . $row["p_contact"] . "</li>";
    echo "<li><strong>Address:</strong> " . $row["p_city"] . "</li>";
    echo "<li><strong>meeting with:</strong> " . $row["meeting_with"] . "</li>";
    echo "<li><strong>prescription:</strong> " . $row["prescription"] . "</li>";
    echo "<footer><p>&copy; 2023 Divine Hospital</p></footer>";
    echo "</ul>";
    }
} else {
    //if login details are incorrect, display error message
    echo "Invalid login details. Please try again.";
}

//close database connection
$conn->close();
?>
</body>
</html>