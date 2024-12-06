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
    $red = rand(0, 255);
    $green = rand(0, 255);
    $blue = rand(0, 255);

    $randomColor = "rgb($red, $green, $blue)";



    ?>
    <form action="home.php" method="post">
        <fieldset>
            
            <h4>You are succesfully Logged in</h4> <h2 style='color: <?php echo $randomColor; ?>;'><?php echo  date("Y/m/d") . "<br>" . date(" l") . "<br>" . date(" h:i:sa") ; ?></h2>

        </fieldset>
        If you wish to return to the login page<br> <input type="submit" name="logout" value="logout">
    </form>

    <a href="quote.php"><button>Quote</button></a>

    <?php if (!empty($error)): ?>
        <div style="color: red;"><?php echo $error; ?></div>
    <?php endif;?>
    <h2>Genereate QR code:<br>

    </h2>
    <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" name="qr">
        <label for="text">Insert material to transform into QR.</label>
        <textarea id="text" name="text"></textarea>
        <button>Generate</button>
    
    <?php
    $texttext = "";
    if(isset($_POST["logout"])) {
       // session_destroy() ;
        header("Location: session.php");
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset( $_POST["text"])) {
        if(empty(trim($_POST["text"]))) {
            echo "<p style='color: red;'>Please enter text before generating QR code</p>";
        }
        else {
            $_SESSION["text"] = $_POST["text"];
           header("Location: generate.php");
           exit();
        }
    }
    ?>

    <?php 
    include("footer.html");
    ?>
    </form>
</body>
</html>