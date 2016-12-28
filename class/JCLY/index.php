<?php

include 'ImageProperties.php';
include 'functions.php';

function extractElementsFromWebPage($webPage, $tagName) {
    //Creating a DOMDocument Object.
    $dom = new DOMDocument;

    libxml_use_internal_errors(true);
    //Parsing the HTML from the web page
    if ($dom->loadHTML($webPage)) {
        libxml_clear_errors();
        // Extracting the specified elements from the web page
        @$elements = $dom->getElementsByTagName($tagName);
        return $elements;
    }
    return FALSE;
}

function downloadURL($URL) {
    $webPage = file_get_contents ($URL);
    return $webPage;
}

$webPage = downloadURL("https://www.mozilla.org/en-US/");
$url = 'http://www.mozilla.org';
$parts = parse_url($url);
if (isset($parts['scheme'])){
    $base_url = $parts['scheme'].'://';
} else {
    $base_url = 'http://';
    $parts = parse_url($base_url.$url);
}
$base_url .= $parts['host'];
if (isset($parts['path'])){
    $base_url .= $parts['path'];
}

$ImageInfo = new ImageProperties();
$counter = 0;

if ($webPage ) {
    $imageURLURLs = extractElementsFromWebPage($webPage, 'img');
    if ($imageURLURLs) {
        foreach ($imageURLURLs as $imageURL) {
            // Extracting the URLs
            //echo $base_url . $imageURL->getAttribute('src');
            //echo '<br>';
            $tmp = $base_url . $imageURL->getAttribute('src');


            /*0 => int 152
              1 => int 45
              2 => int 3
              3 => string 'width="152" height="45"' (length=23)
              'bits' => int 8
              'mime' => string 'image/png' (length=9) */
            //get file size
            $size = getimagesize($tmp);
            if ($size) {
                //var_dump($size);
                $ImageInfo->setDimensionX($size[0]);
                $ImageInfo->setDimensionY($size[1]);
                $ImageInfo->setExtType($size['mime']);
                $ImageInfo->setSize($size[0] * $size[1]);
            } else {
                $ImageInfo->setDimensionX(0);
                $ImageInfo->setDimensionY(0);
                $ImageInfo->setExtType('');
                $ImageInfo->setSize(0);
            }

            $dir = explode("/", $tmp);
            $ext = explode(".", $dir[sizeof($dir) - 1]);
            $ImageInfo->setSitename($dir[2]);
            $ImageInfo->setPictureName($dir[sizeof($dir) - 1]);
            $ImageInfo->setLocalPath("downloads/" . $ext[0] . '.' . $ext[2]);

            //var_dump($dir);
            //var_dump($ImageInfo);
            //var_dump($ext);

            //Get the file
            $downloadImage = str_replace('.' . $ext[1], '', $tmp);
            //echo $downloadImage . '<br>';
            $content = file_get_contents($downloadImage);
            //Store in the filesystem.
            $fp = fopen("downloads/" . $ext[0] . '.' . $ext[2], "w");
            fwrite($fp, $content);
            fclose($fp);

            //INSERT INTO `imageinfo`(`sitename`, `local_path`, `picture_name`, `ext_type`, `created_at`, `size`, `dimension_x`, `dimension_y`)
            $table = 'imageinfo';
            $rows = "`sitename`, `local_path`, `picture_name`, `ext_type`, `size`, `dimension_x`, `dimension_y`";
            $values = "'".$ImageInfo->getSitename()."'".','. "'".$ImageInfo->getLocalPath()."'".','."'".$ImageInfo->getPictureName()."'".','."'".$ImageInfo->getExtType()."'".','.$ImageInfo->getSize().','.$ImageInfo->getDimensionX().','.$ImageInfo->getDimensionY();
            echo "INSERT INTO $table ($rows) VALUES ($values)";
            //connect db
            $pdo = connectToDB();
            //insert db
            try {
                $stmt = $pdo->prepare("INSERT INTO $table ($rows) VALUES ($values)");
                $stmt->execute();
                $stmt->fetchAll(PDO::FETCH_ASSOC);
                //echo $stmt;
            } catch(PDOException $e) {
                echo "Oops... {$e->getMessage()}";
            }

        }
    }
    else {
        echo "Error in parsing the webPagen";
    }
}
else {
    echo "Error in downloading the webPagen";
}


?>