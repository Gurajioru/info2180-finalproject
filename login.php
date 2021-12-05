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
    $emailaddress = $_POST['emailaddress'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM `email` WHERE emailaddress = '$emailaddress' AND password = '$password'";
    $result = mysqli_query($conn,$sql);
    if ($result -> num_rows > 0){
        echo "Logged In ";
    }else{
        echo "<script> alert(No Users Found with details)</script>"; 

    if (empty($emailaddress)) {
        header("Location: login.php?error=Email Address is required");
        exit();
    }else if(empty($password)){
        header("Location: login.php?error=Password is required");
        exit();
    }
    if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['emailqaddress'] === $emailaddress && $row['password'] === $password) {
                echo "Logged in!";
                header("Location: home.php");  // dashboard setup
                exit();
            }else{
                header("Location: login.php?error=Invalid email address or password");
                exit();
            }
        }else{
            header("Location: login.php?error=Invalid email address or password");
            exit();
        }
    }
}else{
    header("Location: login.php");
    exit();
}