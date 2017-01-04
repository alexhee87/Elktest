<?php

include 'ConDB.php';

$ContentURL='http://www.imdb.com//';
$ContentPage = file_get_contents($ContentURL);
preg_match_all('/(?:https?:\/\/\S+\.(?:jpg|png|gif))/', $ContentPage, $Images);
$folderName=date("Ymdhisa");

for ( $counter = 0; $counter <= count($Images[0])-1; $counter ++) {
    $url = $Images[0][$counter];
    list($width, $height, $type, $attr) = getimagesize($url);
    $imageSize = get_headers($url, 1);
    $bytes = $imageSize["Content-Length"];

    DownloadImage($url,$folderName);

    SaveImage($ContentURL,$url,$bytes,$width,$height);

}

function DownloadImage($url,$folderName){
    $image_link = $url;//Direct link to image
    $split_image = pathinfo($image_link);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL , $image_link);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response= curl_exec ($ch);
    curl_close($ch);

    createPath('download/'.$folderName);
    $file_name = 'download/'.$folderName."/".$split_image['filename'].".".$split_image['extension'];
    $file = fopen($file_name , 'w') or die("X_x");
    fwrite($file, $response);
    fclose($file);
}

function SaveImage($image_link,$url,$bytes,$width,$height){

    $Conn = new ConDB();
    $Conn->SaveImageToDB(getHost($image_link),$url,basename($url),pathinfo($url, PATHINFO_EXTENSION),date("Y/m/d h:i:sa"),$bytes,$width,$height);

}

function getHost($Address) {
    $parseUrl = parse_url(trim($Address));
    return trim($parseUrl['host'] ? $parseUrl['host'] : array_shift(explode('/', $parseUrl['path'], 2)));
}

Function createPath($path) {
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }
}




?>