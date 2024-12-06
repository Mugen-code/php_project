<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" >
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div id="Container">
  
    <a href = "home.php"><button>Home</button></a>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>"method=post>
    What type of quote would you like?
    
    <div id="buttonContainer">
        <button type="button" class="quoteButton" data-tag="love">Love</button>
        <button type="button" class="quoteButton" data-tag="life">Life</button>
        <button type="button" class="quoteButton" data-tag="wisdom">Wisdom</button>
    </div>    

        <div id="quoteContainer">
        </div>
        <p></p>
        <p id="quoteAuthor"></p>

</div>
</form>


</body>
</html>

<script stype="text/javascript">
$(document).ready(function() {
    $(".quoteButton").click(function() {
        var tag = $(this).data("tag");

        $.ajax({
            type: 'POST',
            url: 'getquote.php',
            data: { tag: tag }, 
            success: function(data) {
                try {
                    var obj = JSON.parse(data);

                    var html = `
                        <fieldset>
                            <legend>${tag.charAt(0).toUpperCase() + tag.slice(1)} Quote</legend>
                            <h4><br>${obj.quote}</h4><br>
                            <h2>${obj.author}</h2><br>
                        </fieldset>
                    `;

                    $("#quoteContainer").html(html);
                } catch (error) {
                    console.error("Invalid JSON response", error);
                    $("#quoteContainer").html("Error retrieving quote.");
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error", status, error);
                $("#quoteContainer").html("Error connecting to the server.");
            }
        });
    });
});

</script>
