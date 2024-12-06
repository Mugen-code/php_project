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
?>
<header><h2>QR generator</h2></header>
<a href="session.php"><button>Login</button></a>
<hr>

    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            <fieldset>
            <legend>Register</legend>
            <h3>Register to generate
                
            </h3>
            Username:
            <input type="text" name="reg_username"><br>
            Password:
            <input type="password" name="reg_password"><br>
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
        if(isset($_POST["login"])){
            $_SESSION["reg_username"] = test_input($_POST["reg_username"]);
            $_SESSION["reg_password"] = test_input($_POST["reg_password"]);
    
            if(!empty($_POST["reg_username"]) && !empty($_POST["reg_password"])){
                
            }
            else{ 
                echo "<p style='color: red;'>Username/Password cannot be empty!</p>";
            }
        }   
        if(isset($_POST["login"]) && !empty($_POST["reg_username"]) && !empty( $_POST["reg_password"])){
            header("Location: home.php");
        }
        



?>

<?php        include("footer.html"); ?>
</body>
</html>