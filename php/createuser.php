<?php

 session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFO2180 Project 2</title>
    <link rel="stylesheet" href="../styles/createuser.css">
    <script src="../scripts/createuser.js" type="text/javascript"></script>    

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
    
        <div id = "adduser">
            <h1>New User</h1>

            <div id = "result">
            </div>
            
            <form>
        

            <label class = "formheading">First Name</label><br>
            <input type = "text" name = "firstname" id="firstname" > <br><br>

            <label class = "formheading">Last Name</label><br>
            <input type = "text" name = "lastname" id="lastname" ><br><br>

            <label class = "formheading">Password</label><br>
            <input type = "text" name = "password" id="password"> <br><br>

            <label class = "formheading">Email</label><br>
            <input type = "email" name = "email" id="email" ><br><br>

            <button type = "submit" name = "sbtn" id = "sbtn">Submit</button>


            </form>
        </div>
        

</div>

</body>

</html>
