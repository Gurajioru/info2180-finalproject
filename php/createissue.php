<?php

    require_once "conn.php";

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $names = "SELECT firstname, lastname FROM users";
    $stmt = $conn->query($names);
    $allnames = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFO2180 Project 2</title>
    <link rel="stylesheet" href="../styles/createissue.css">
    <script src = "../scripts/newissue.js"></script>

</head>


<header>
    <img src="icons/bug-64.png" alt="bug logo" id="bug" />
    <h2 id="mainHead">BugMe Issue Tracker</h2>
</header>

<div class="after">
    <aside>
        <div id="sidebar">
            <ul>
                <li> <a href="dashboard.html" ><img src="../icons/home.png" alt="home" class="side-images"/>
                    Home</a></li>
                    
                <li> <a href="createuser.php" ><img src="../icons/add-user.png" alt="home" class="side-images"/>
                    Add User</a></li>

                <li> <a href="createissue.php" ><img src="../icons/plus.png" alt="home" class="side-images"/>
                    New Issue</a></li>

                <li> <a href="#" ><img src="../icons/power-off.png" alt="home" class="side-images"/>
                    Logout</a></li>
            </ul>
        </div>         

    </aside>
    
    <div id = "newissue">
        <h1>Create Issue</h1>

        <form>
            
        <label>Title</label><br>
        <input type = "text" name = "title" id = "title"> <br><br>

        <label>Description</label><br>
        <textarea type="text" id="description" name="description"></textarea><br>
              
        <label>Assigned To</label><br>
        <select name = "assignedto" id="assignedto" class ="assignedto"></br>
        <option id = "select"> Select an option </option>

        <?php foreach ($allnames as $names) : ?>
                    <?php $fullname = $names['firstname'] . " " . $names['lastname']; ?>
                    <option value="<?php echo $fullname; ?>"><?php echo $fullname; ?></option>
                <?php endforeach; ?>
        </select>

        <label> Type </label><br>
        <select name="type" id = "type">
            <option value="Bug"> Bug </option>
            <option value="Proposal"> Proposal </option>
            <option value="Task"> Task </option>
        </select><br>

        <label> Priority </label><br>
                <select id="Priority" name="Priority">
                    <option value="Major"> Major </option>
                    <option value="Minor"> Minor </option>
                    <option value="Critical"> Critical </option>
                </select><br>
        <button type = "submit" name = "submit" id = "submit">Submit</button>


        </form>

        <div id = "result">
        </div>

    </div>

</div>
</body>

</html>
