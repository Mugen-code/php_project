<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Document</title>
</head>
<body>
    <?php  
    session_start();

    include("header.html");
    ?>

    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <fieldset>
        <legend>Login</legend>
        <h3>Login to generate.</h3>
        Username:
        <input type="text" name="username"><br>
        Password:
        <input type="password" name="password"><br>
        <input type="submit" name="login">
        </fieldset>
    </form>
    <?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(isset($_POST["login"]) ){
       /* $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];*/
       // $_POST["username"] = test_input($_POST["username"]);
      //  $_POST["password"] = test_input($_POST["password"]);

        if(empty($_POST ["reg_username"]) && empty($_POST["reg_password"])) {
          //  echo "<p style='color: red;'>Register first if you do not have an account!</p>";
        }

        if(!empty($_POST["username"]) && !empty( $_POST["password"])){
            echo "<p style='color: red;'>Register first if you do not have an account!</p>";
        }
        else{ 
        echo "<p style='color: red;'>Username/Password cannot be empty!</p>";
        }
    }   
    if(isset($_POST["login"]) && !empty($_POST["username"]) && !empty( $_POST["password"]) && isset($_SESSION["reg_username"], $_SESSION["reg_password"]) &&  $_SESSION["reg_username"] == $_POST["username"] && $_SESSION["reg_password"] == $_POST["password"]){
        header("Location: home.php");
    }




    include("footer.html");
    ?>
</body>
</html>