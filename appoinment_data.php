<!DOCTYPE html>
<html>
<head>
	<title>Appointments</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			text-align: left;
			padding: 8px;
		}

		th {
			background-color: #4CAF50;
			color: white;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		a {
			background-color: #4CAF50;
			border: none;
			color: white;
			padding: 10px 20px;
            margin:20px;
			text-align: center;
			text-decoration: none;
			font-size: 20px;
            margin:20px;
			cursor: pointer;
		}
        #logout-div{
            display:flex;
            justify-content:flex-end;
            
        }

        #logout{
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin-top: 20px;
			border: none;
			width: 100px;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
		}
	</style>
</head>
<body>
        <div id="logout-div">
        <button id="logout">Logout</button>
        </div>

<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "Pri@2004";
$dbname = "hospital";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if "history" button/link is clicked
if(isset($_GET['history'])) {
  // Retrieve past appointments
  $today = date('Y-m-d');
  $sql_past = "SELECT * FROM patient WHERE a_date < '$today'";
  $result_past = $conn->query($sql_past);

  echo "<h2>Past Appointments:</h2>";
  if ($result_past->num_rows > 0) {
    echo "<table><tr><th>Case_no</th><th>Patient Name</th><th>Appointment Date</th><th>Patient Contact</th><th>Patient Age</th><th>patient bloodgroup</th><th>Prescription</th><th>Action</th></tr>";
    while($row = $result_past->fetch_assoc()) {
      echo "<tr><td>".$row["case_no"]."</td><td>".$row["p_name"]."</td><td>".$row["a_date"]."</td><td>".$row["p_contact"]."</td><td>".$row["p_age"]."</td><td>".$row["p_bloodgroup"]."</td><td>".$row["prescription"]."</td><td><form method='get' action='edit.php'><input type='hidden' name='case_no' value='" . $row["case_no"] . "'><button type='submit' class='edit-btn'>Edit</button></form></td></tr>";
    }
    echo "</table>";
  } else {
    echo "No past appointments.";
  }
} 

else if(isset($_GET['upcoming'])) {
    // Retrieve past appointments
    $today = date('Y-m-d');
    $sql_past = "SELECT * FROM patient WHERE a_date > '$today'";
    $result_past = $conn->query($sql_past);
  
    echo "<h2>Upcoming Appointments:</h2>";
    
    if ($result_past->num_rows > 0) {
      echo "<table><tr><th>Case_no</th><th>Patient Name</th><th>Appointment Date</th><th>Patient Contact</th><th>Patient Age</th><th>patient bloodgroup</th><th>Prescription</th><th>Action</th></tr>";
      while($row = $result_past->fetch_assoc()) {
        echo "<tr><td>".$row["case_no"]."</td><td>".$row["p_name"]."</td><td>".$row["a_date"]."</td><td>".$row["p_contact"]."</td><td>".$row["p_age"]."</td><td>".$row["p_bloodgroup"]."</td><td>".$row["prescription"]."</td><td><form method='get' action='edit.php'><input type='hidden' name='case_no' value='" . $row["case_no"] . "'><button type='submit' class='edit-btn'>Edit</button></form></td></tr>";
      }
      echo "</table>";
    } else {
      echo "No upcoming appointments.";
    }
  } 

else {
  // Retrieve today's appointments
  $today = date('Y-m-d');
  $sql_today = "SELECT * FROM patient WHERE a_date = '$today'";
  $result_today = $conn->query($sql_today);

  echo '<a href="?history">View History</a>';
  echo '<a href="?upcoming">View upcoming</a>';
  echo "<h2>Today's Appointments:</h2>";

  if ($result_today->num_rows > 0) {
    echo "<table><tr><th>Case_no</th><th>Patient Name</th><th>Appointment Date</th><th>Patient Contact</th><th>Patient Age</th><th>patient bloodgroup</th><th>Prescription</th><th>Action</th></tr>";
    while($row = $result_today->fetch_assoc()) {
        echo "<tr><td>".$row["case_no"]."</td><td>".$row["p_name"]."</td><td>".$row["a_date"]."</td><td>".$row["p_contact"]."</td><td>".$row["p_age"]."</td><td>".$row["p_bloodgroup"]."</td><td>".$row["prescription"]."</td><td><form method='get' action='edit.php'><input type='hidden' name='case_no' value='" . $row["case_no"] . "'><button type='submit' class='edit-btn'>Edit</button></form></td></tr>";
    }

    echo "</table>";
  } else {
    echo "<br>";
    echo "<br>";
    echo "No appointments today.";
  }


}

$conn->close();
?>

<script>
    const logoutButton = document.getElementById('logout');

logoutButton.addEventListener('click', (event) => {
	event.preventDefault();
	
	// show confirmation dialog
	if (confirm('Are you sure you want to logout?')) {
		// user clicked OK, perform logout
		window.location.href = 'index.php';
	}
});

  </script>


</body>
</html>