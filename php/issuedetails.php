<?php
require_once "conn.php";

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password) or die('Cannot connect');

// TODO: Get the user id from session
$user_id = 0;
$id = $_GET['id'];

$stmt = $conn->prepare("select * from issues where id = '$id'");

$stmt->execute();
$issue = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFO2180 Project 2</title>
    <link rel="stylesheet" href="../styles/issuedetails.css">


</head>


<header>
    <img src="../icons/bug-64.png" alt="bug logo" id="bug" />
    <h2 id="mainHead">BugMe Issue Tracker</h2>
</header>

<div class="after">
    <aside>
        <div id="sidebar">
            <ul>
            <li> <a href="../php/dashboard.php" ><img src="../icons/home.png" alt="home" class="side-images"/>
                    Home</a></li>
                    
             <li> <a href="../php/createuser.php" ><img src="../icons/add-user.png" alt="home" class="side-images"/>
                    Add User</a></li>

             <li> <a href="../php/createissue.php" ><img src="../icons/plus.png" alt="home" class="side-images"/>
                    New Issue</a></li>

             <li> <a href="../php/logout.php" ><img src="../icons/power-off.png" alt="home" class="side-images"/>
                    Logout</a></li>
            </ul>
        </div>         

    </aside>
    
    <main>
        <div class="issue-header">
            <h1><?= $issue[0]['title']; ?></h1>
            <h6 class="issue-tag">Issue <?= $issue[0]['id']; ?></h6>
        </div>

        <div class="details-body">
            <div class="issue-body">
                <p><?= $issue[0]['_description']; ?></p>
            </div>
            <div>
                <div class="issue-details">
                    <span class="detail-con">
                        <h4 class="detail-title">Assigned To</h4>
                        <p class="detail-info"><?= $issue[0]['assigned_to']; ?></p>
                    </span>
                    <span class="detail-con">
                        <h4 class="detail-title">Type</h4>
                        <p class="detail-info"><?= $issue[0]['_type']; ?></p>
                    </span>
                    <span class="detail-con">
                        <h4 class="detail-title">Priority</h4>
                        <p class="detail-info"><?= $issue[0]['priority']; ?></p>
                    </span>
                    <span class="detail-con">
                        <h4 class="detail-title">Status</h4>
                        <p class="detail-info"><?= $issue[0]['_status']; ?></p>
                    </span>
                </div>
                <div class="btns">
                    <button class="closed">Mark as closed</button>
                    <button class="progress">Mark in progress</button>
                </div>
            </div>
        </div>
    </main>
</div>


</body>

</html>
