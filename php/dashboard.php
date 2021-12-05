<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFO2180 Project 2</title>
    <link rel="stylesheet" href="./../styles/dashboard.css">
</head>


<header>
    <img src="./../icons/bug-64.png" alt="bug logo" id="bug" />
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
        </div>

    </aside>

    <div id="issues">
        <div class="issues-header">
            <h1>Issues</h1>
            <a id="create-issue-btn" href="../php/createissue.php" >Create New Issue</a>
        </div>
        <div id="filter">
            <h3> Filter by: </h3>
            <ul id="filter-options">
                <li><button id="allissues" class="selected-filter"> All </button></li>
                <li><button id="openissues"> Open </button> </li>
                <li><button id="myissues"> My Tickets </button></li>
            </ul>
        </div>
        <table>
            <tbody id="issues-body">
                
            </tbody>
        </table>
    </div>

</div>
<script src="./../scripts/dashboard.js"> </script>
</body>

</html>