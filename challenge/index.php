<?php

/**
 * Created by Alex Hee for Elken training
 */

//iterate through the directory from this path

$dir = scandir('.');
$arr = array();

foreach($dir as $d){
    $tmpName = explode('.', $d);
    if(!isset($tmpName[1]) || $tmpName[1] != 'php' || in_array($tmpName[0], array('index','question','training'))){
        continue;
    }
    $arr[] = $d;
}

?>

<html>
    <head>
        <title>Welcome to GIT PHP Training</title>
    </head>
    <body>
        <h1>Let's test out the challenge</h1>
        <ul>
        <?php foreach($arr as $dir){ ?>
        <li>
            <a href="<?php echo $dir; ?>?iteration=10" target="_blank"><?php echo $dir; ?></a>
        </li>
        <?php } ?>
        </ul>
    </body>
</html>
