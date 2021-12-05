<?php 
session_start(); 

require_once "conn.php";

if (isset($_POST['submit'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    $emailaddress = validate($_POST['emailaddress']);
    $password = validate(password_hash($_POST['password']));
    if (empty($emailaddress)) {
        header("Location: login.php?error=Email Address is required");
        exit();
    }else if(empty($password)){
        header("Location: login.php?error=Password is required");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE emailaddress = '$emailaddress' AND password = '$password'";
        $result = mysqli_query($conn,$sql);
    
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['emailaddress'] === $emailaddress && $row['password'] === $password) {
                echo "Logged in!";
                $_SESSION['emailaddress'] = $row['emailaddress'];
                $_SESSION['password'] = $row['password'];
                header("Location: home.php");  // dashboard setup
                exit();
        }
    }
    else{
        echo "<script> alert(No Users Found with details)</script>"; 
            }else{
                header("Location: login.php?error=Invalid email address or password");
                exit();
            }
        else{
            header("Location: login.php?error=Invalid email address or password");
            exit();
        }
    }
}else{
    header("Location: login.php");
    exit();
}