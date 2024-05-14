
<?php

$servername = "localhost";
$username = "root";
$password = "Pri@2004";
$database = "hospital";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
    // echo "Connected Successfully";
    
} catch(PDOException $e) {

    echo "Connection Failed" .$e->getMessage();
}


if(isset($_POST['patient_data_btn']))
{
    $p_name = $_POST['p_name'];
    $p_contact = $_POST['p_contact'];
    $p_age = $_POST['p_age'];
    $p_bloodgroup = $_POST['p_bloodgroup'];
    $p_gender = $_POST['p_gender'];
    $p_city = $_POST['p_city'];
    $meeting_with = $_POST['meeting_with'];


    $query = "INSERT INTO patient (p_name, p_contact, p_age, p_bloodgroup,p_gender,p_city,meeting_with) VALUES (:p_name, :p_contact, :p_age, :p_bloodgroup,:p_gender,:p_city,:meeting_with)";
    $query_run = $conn->prepare($query);

    $data = [
        ':p_name' => $p_name,
        ':p_contact' => $p_contact,
        ':p_age' => $p_age,
        ':p_bloodgroup' => $p_bloodgroup,
        ':p_gender' => $p_gender,
        ':p_city' => $p_city,
        ':meeting_with' => $meeting_with,
    ];
    $query_execute = $query_run->execute($data);

    if($query_execute)
    {
        include "successful_store_data.html";
        exit(0);
    }
    else
    {
        echo "not inserted";
        exit(0);
    }
}

?>
