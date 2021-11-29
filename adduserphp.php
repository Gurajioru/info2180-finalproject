<?php
require_once('conn.php');

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "Connected to $dbname at $host successfully. <br>";
    $fname = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_STRING);
    $pwd = filter_input(INPUT_POST, "pwrd", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);

    
    if(isset($fname) && isset($lname) && isset($pwd) && isset($email)){      
        echo"DATA RECIEVED <br>";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pswrd = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(firstname, lastname, pwrd, email)
        VALUES ('$fname', '$lname', '$pswrd', '$email')";
        $conn->exec($sql);
    }
    $conn = null;

} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}


?>