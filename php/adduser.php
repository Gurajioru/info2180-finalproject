<?php session_start();

    require_once 'conn.php';

        try{

        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $fname= filter_input(INPUT_GET,"firstname",FILTER_SANITIZE_STRING); 
        $lname= filter_input(INPUT_GET,"lastname",FILTER_SANITIZE_STRING); 
        $pwd= filter_input(INPUT_GET,"password",FILTER_SANITIZE_STRING);
        $email= filter_input(INPUT_GET,"email",FILTER_SANITIZE_EMAIL); 
        $email= filter_var($email,FILTER_VALIDATE_EMAIL);

        if(isset($fname) && isset($lname) && isset($pwd) && isset($email)){      

            $hashpassword=password_hash($pwd,PASSWORD_DEFAULT);
            $sql=$conn->prepare('INSERT INTO users(firstname,lastname,pwrd,email,date_joined)
            VALUES (:fname,:lname,:hashpassword,:email,NOW());');
            
            $sql->bindParam(":fname",$fname);
            $sql->bindParam(":lname", $lname);
            $sql->bindParam(":hashpassword", $hashpassword);
            $sql->bindParam(":email", $email);
            $sql->execute();
            echo"<br> Welcome, User Created";
    }
}
     catch(PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }
    