<?php

    require_once "conn.php";

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $names = "SELECT firstname, lastname FROM users";
    $stmt = $conn->query($names);
    $n_result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>


<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFO2180 Project 2</title>
    <link rel="stylesheet" href="../styles/issues.css">
    

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
        <div id="issues-con">
            <div id="issues-header">
                <h1>Issues</h1>
                <button id="new-issue" class="btn">Create New Issue</button>
            </div>

            <ul class="filters">
                <li>Filter By:</li>
                <li id="active-item" class="filter-option">ALL</li>
                <li class="filter-option">OPEN</li>
                <li class="filter-option">MY TICKETS</li>
            </ul>

            <table>
                <thead id="table-header">
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th id="issue-status">Status</th>
                        <th>Assigned To</th>
                        <th>Created</th>
                    </tr>
                </thead>

                <!-- Add the issues from the database -->
                <tbody id="issue-body">

                </tbody>
            </table>
        </div>
    </main>
</div>
</body> 
</html>