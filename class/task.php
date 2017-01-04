<?php

/**
 * Work in a pair. Create a system to read and write to database.
 * Create a system to crawl any site url. Get the html output and download the image into the 
 * respective folder. For example, you can name the folder as www.somesite.com. 
 * Once you retrieve all the pictures and placed it properly, go through each pictures within 
 * the folder and extract the image information. Insert all the information into the table of your choice.
 * Create any number of classes or functions to deal with the flow.
 * Please work in pair and diversify the work. Create a folder of your team name and also a sql/txt
 * file to import your db structure. Good luck!
 * Extra : 
 * 1. create a class/function to retrieve all the pictures from specific site with dimension
 * parameter (minimum pixel), extension type, but  the additional filter is considered optional.
 *
 * Tips :
 * CURL or content_get() to get HTML
 * Regular expression to get all the images url
 * database images information that you might want to keep : sitename | local_path | picture_name | ext_type | created_at | size | dimension_x | dimension_y
 */

$page = file_get_contents('http://www.imdb.com');
//echo $page;
echo '<pre>';
preg_match_all('/(?:https?:\/\/\S+\.(?:jpg|png|gif))/', $page, $images);

print_r($images);