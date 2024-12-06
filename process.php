<html>
    <head><h2>User storage</h2></head>

    <body>

        <?php 

        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $age = $_POST["age"];

        $array = [$name . $surname =>$age];
        
        if ($name == "Mike" and $surname == "Tren" and $age == 20) {
            echo "Hello mister president";
        }
        else
        {
            echo "Hello primordial.";
        }
        
        echo "<br>";

        if ($age > 18) {
            echo "Welcome to the underground club $name $surname. Enjoy your stay.<br>";
        }
        else
        {
            echo "You shall be banished child.<br>";
        }
        
        $file = fopen("saved.txt","w");
        fwrite($file,"$name $surname, age: $age");
        fclose($file);
        echo"Data has been saved succesfully<br>";
        var_dump($array);
        ?>

        


    </body>
</html>