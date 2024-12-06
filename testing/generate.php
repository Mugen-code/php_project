<?php
    session_start();
    require "vendor/autoload.php";

    use Endroid\QrCode\QrCode;
    use Endroid\QrCode\Writer\PngWriter;

    $text = $_SESSION["text"];

    $qr_code = new QrCode($text);
                        

    $writer = new PngWriter();

    $result = $writer->write($qr_code);

    header("Content-type: " . $result->getMimeType());

    echo $result->getString();
