<?php
function pre_r($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
//$url = "https://www.goodreads.com/quotes/tag/love?page=1";
$curl = curl_init();
$data = array() ;
$page_min = 1;
$page_max = 3;
$counter = 0;
$random = random_int(1,20) ;
if(isset($_POST["love_button"])){$love = "love";} else {$love = "";} 
if(isset($_POST["life_button"])){$life = "life";} else {$life = "";} 
if(isset($_POST["wisdom_button"])){$wisdom = "wisdom";} else {$wisdom = "";} 

    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_USERAGENT,"Mozilla/5.0");

    $tags = array("love","life","wisdom");
    foreach ($tags as $tag) {

        for ( $p = $page_min; $p <= $page_max; $p++) {
        
            $url = "https://www.goodreads.com/quotes/tag/$tag?page=$p";
            curl_setopt($curl, CURLOPT_URL,"$url");
            $result = curl_exec($curl);

            preg_match_all("!&ldquo;(.*?)&rdquo;.*?<span class=\"authorOrTitle\">(.*?)</span>!is", $result, $matches);
            $quotes = $matches[1];
            $authors = $matches[2];

            for($q = 0; $q < count($quotes); $q++) {
                $data[$tag][$counter]['quote'] = $quotes[$q];
                $data[$tag][$counter]['author'] = rtrim(trim($authors[$q]),',');
                $counter++;
            }
        }
        $counter = 0;

    }/*
        if ($love == "love"){
            echo "<fieldset>";
            echo "<legend>Love Quote</legend>";
            echo "<h4><br>". $data["love"][$random]['quote']. "</h4><br>";
            echo "<h2>". $data["love"][$random]['author']. "</h2><br>";
            echo "</fieldset>";
        }
        if ($life == "life"){
            echo "<fieldset>";
            echo "<legend>Life Quote</legend>";
            echo "<h4><br>". $data["life"][$random]['quote']. "</h4><br>";
            echo "<h2>". $data["life"][$random]['author']. "</h2><br>";
            echo "</fieldset>";
        }
        if ($wisdom == "wisdom"){
            echo "<fieldset>";
            echo "<legend>Wisdom Quote</legend>";
            echo "<h4><br>". $data["wisdom"][$random]['quote']. "</h4><br>";
            echo "<h2>". $data["wisdom"][$random]['author']. "</h2><br>";
            echo "</fieldset>";
        }
*/
pre_r($data);
    require_once 'db.php';
    $mysqli = new mysqli($host,$user,$pass,$db) or
    die(mysqli_error($mysqli));

    foreach ($data as $key => $tag) {
        for ($i = 0; $i < count($data[$key]); $i++){
            $quote = $mysqli->real_escape_string($data[$key][$i]['quote']);
            $author = $mysqli->real_escape_string($data[$key][$i]['author']);
            $sql = "INSERT IGNORE INTO $table (quote, author, tag)
            VALUES ('$quote', '$author', '$key')";
            $mysqli->query($sql) or die($mysqli->error);
        }
    }

?>

