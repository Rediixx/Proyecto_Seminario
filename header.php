<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/header.css">
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
        >
        <title>Login</title>
    </head>

    <body>
        <nav>
            <div class="header">
                <a class="logo">To-Do List</a>
                <div class="header-right">
                    <a class="active" href="add.php">Home</a>
                    <a href="#contact">Contact</a>
                    <a href="about.php">About</a>
                    <a class="red" href="includes/logout.inc.php">Logout</a>
                </div>
            </div> 
        </nav>     
    </body>
</html>