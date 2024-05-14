
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


if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $a_date = $_POST['a_date'];

    $query = "INSERT INTO patient (p_name, p_contact, email, a_date) VALUES (:name, :number, :email, :a_date)";
    $query_run = $conn->prepare($query);

    $data = [
        ':name' => $name,
        ':number' => $number,
        ':email' => $email,
        ':a_date' => $a_date,
    ];
    $query_execute = $query_run->execute($data);

    if($query_execute)
    {
        include "thankyou.html";
        exit(0);
    }
    else
    {
        echo "not inserted";
        exit(0);
    }
}

?>
