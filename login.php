<?php
session_start();

function userLogin($emailAddress, $password)
{
    if (!(CheckLoginInDB($emailAddress, $password))) {
        echo "Login Failed";
        header("Location: index.html");
    } else {
        header("Location: ./php/dashboard.php");
    }
}

function CheckLoginInDB($emailAddress, $password)
{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $checkLoginQuery = "SELECT id, firstname, lastname, email, pwrd FROM users WHERE email ='$emailAddress'";
    $stmt = $connect->query($checkLoginQuery);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($emailAddress == $result['email'] && (password_verify($password, $result['pwrd']) || MD5($password) == $result['pwrd'])) {
        $_SESSION["user_id"] = $result['id'];
        $_SESSION["firstname"] = $result['firstname'];
        $_SESSION["lastname"] = $result['lastname'];
        $_SESSION["issue"] = "";
        return true;
    } else {
        return false;
    }
}

if (isset($_POST['submit_form'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    userLogin($email, $password);
}