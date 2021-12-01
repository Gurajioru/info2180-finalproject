<?php session_start(); 

require_once "conn.php";

try{

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $title=filter_input(INPUT_GET,"title",FILTER_SANITIZE_STRING); 
    $description= filter_input(INPUT_GET,"description",FILTER_SANITIZE_STRING); 
    $assignto= filter_input(INPUT_GET,"assignedto",FILTER_SANITIZE_STRING);
    $type= filter_input(INPUT_GET,"type",FILTER_SANITIZE_STRING); 
    $priority= filter_input(INPUT_GET,"priority",FILTER_SANITIZE_STRING);

    $sessionid =$_SESSION['user_id'];

    $myids = $conn->query("SELECT id FROM Users WHERE CONCAT(firstname,' ',lastname)='$assignto' ");
    $myidsfinals = $myids->fetch(PDO::FETCH_ASSOC);
    if(isset($myidsfinals)){
        $assignid=$myidsfinals['id'];
    $sql=$conn->prepare('INSERT INTO Issues (title, _description, _priority, _type, _status, assigned_to, created_by, created, updated)
    VALUES ( :title, :_description,:priority,:_type,:_status,:assignid,:createid , NOW(), NOW());');
    
    $sql->bindParam(":title",$title);
    $sql->bindParam(":description", $description);
    $sql->bindParam(":priority", $priority);
    $sql->bindParam(":_type", $type);
    $sql->bindParam(":_status",$status);
    $sql->bindParam(":createid", $sessionid);
    $sql->bindParam(":assignid", $assignid);
    $sql->execute();
    echo"Issue Created.";
    
}catch(PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
