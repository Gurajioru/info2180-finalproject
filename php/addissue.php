<?php session_start(); 
require_once "conn.php";

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $title=filter_input(INPUT_GET,"title",FILTER_SANITIZE_STRING); 
    $description= filter_input(INPUT_GET,"description",FILTER_SANITIZE_STRING); 
    $assignto= filter_input(INPUT_GET,"assignedto",FILTER_SANITIZE_STRING);
    $type= filter_input(INPUT_GET,"type",FILTER_SANITIZE_STRING); 
    $priority= filter_input(INPUT_GET,"priority",FILTER_SANITIZE_STRING);
    $status="OPEN";
    $sessionid = 1;
    $assignid = 1;

    $stmt=$conn->prepare('INSERT INTO Issues (title, _description, _priority, _type, _status, assigned_to, created_by, created, updated)
    VALUES ( :title, :_description,:priority,:_type,:_status,:assignid,:createid , NOW(), NOW());');
    $stmt->bindParam(":title",$title);
    $stmt->bindParam(":_description", $description);
    $stmt->bindParam(":priority", $priority);
    $stmt->bindParam(":_type", $type);
    $stmt->bindParam(":_status",$status);
    $stmt->bindParam(":createid", $sessionid);
    $stmt->bindParam(":assignid", $assignid);
    $stmt->execute();
    echo"Issue created.";
    
}catch(PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
