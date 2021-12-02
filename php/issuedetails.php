<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFO2180 Project 2</title>
    <link rel="stylesheet" href="styles/issuedetails.css">


</head>


<header>
    <img src="icons/bug-64.png" alt="bug logo" id="bug" />
    <h2 id="mainHead">BugMe Issue Tracker</h2>
</header>

<div class="after">
    <aside>
        <div id="sidebar">
            <ul>
                <li> <a href="#" ><img src="icons/home.png" alt="home" class="side-images"/>
                    Home</a></li>
                    
                <li> <a href="#" ><img src="icons/add-user.png" alt="home" class="side-images"/>
                    Add User</a></li>

                <li> <a href="#" ><img src="icons/plus.png" alt="home" class="side-images"/>
                    New Issue</a></li>

                <li> <a href="#" ><img src="icons/power-off.png" alt="home" class="side-images"/>
                    Logout</a></li>
            </ul>
        </div>         

    </aside>
    
    <div id = "right-aside">
        <h5> Assigned To</h5>

        <h5> Type </h5>

        <h5> Priority </h5>

        <h5> Status</h5>

    </div><br>

    <div class = "buttons">
        <button type="submit"> Mark as Closed </button><br><br>
        <button type="submit"> Mark in Progress </button>
    </div>
    <div id="result"></div>
    </div>

</div>


</body>

</html>
