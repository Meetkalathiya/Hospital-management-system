<script type = "text/javascript" >  
        function preventBack() { window.history.forward(); }  
        setTimeout("preventBack()", 0);  
        window.onunload = function () { null };  
    </script> 

<?php
// Connect to database
$conn = mysqli_connect('localhost', 'root', 'Pri@2004', 'hospital');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get patient details from form input
$name = mysqli_real_escape_string($conn, $_POST['name']);
$mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$p_age = mysqli_real_escape_string($conn, $_POST['p_age']);
$p_gender = mysqli_real_escape_string($conn, $_POST['p_gender']);
$p_bloodgroup = mysqli_real_escape_string($conn, $_POST['p_bloodgroup']);
$meeting_with = mysqli_real_escape_string($conn, $_POST['meeting_with']);

// Update patient data in database
$sql = "UPDATE patient SET p_name='$name', p_city='$address', email='$email',p_age='$p_age',p_gender='$p_gender',p_bloodgroup='$p_bloodgroup',meeting_with='$meeting_with' WHERE p_contact='$mobile_number'";
if (mysqli_query($conn, $sql)) {
    include "successful_store_data.html";
} else {
    echo "Error updating patient data: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
