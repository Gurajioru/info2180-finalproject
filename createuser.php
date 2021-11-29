<?php

 session_start();
 $s_id = $_SESSION['id'];
?>



<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFO2180 Project 2</title>
    <link rel="stylesheet" href="styles/createuser.css">


</head>


<header>
    <img src="icons/bug-64.png" alt="bug logo" id="bug" />
    <h2 id="mainHead">BugMe Issue Tracker</h2>
</header>

<div class="after">
    <aside>
        <div id="sidebar">
            <ul>
                <li> <a href="dashboard.html" ><img src="icons/home.png" alt="home" class="side-images"/>
                    Home</a></li>
                    
                <li> <a href="createuser.html" ><img src="icons/add-user.png" alt="home" class="side-images"/>
                    Add User</a></li>

                <li> <a href="issuedetails.html" ><img src="icons/plus.png" alt="home" class="side-images"/>
                    New Issue</a></li>

                <li> <a href="#" ><img src="icons/power-off.png" alt="home" class="side-images"/>
                    Logout</a></li>
            </ul>
        </div>         

    </aside>
    
    <div id = "adduser">
        <h1>New User</h1>

        <form method>

        <label>First Name</label><br>
        <input type = "text" name = "firstname" id="firstname" > <br><br>

        <label>Last Name</label><br>
        <input type = "text" name = "lastname" id="lastname" ><br><br>

        <label>Password</label><br>
        <input type = "text" name = "password" id="password"> <br><br>

        <label>Email</label><br>
        <input type = "email" name = "email" id="email" ><br><br>

        <button type = "submit" name = "submit" id = "sbtn">Submit</button>


        </form>
    </div>

</div>

</body>

</html>
