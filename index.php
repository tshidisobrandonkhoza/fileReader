<?php

$curDir = dirname(basename(__FILE__));
function findIndexFiles($dir)
{
    if (!is_dir($dir))  return [];
    $files = scandir($dir);
    $indexFiles = [];
    // skip . and .. which is on all files
    foreach ($files as $file) {
        if ($file == '.' || $file == '..') continue;
        //get the full path,add a separator, add the directory scanned name
        $fullPath = $dir . '/' . $file;
        //now lets see if the is an index a
        if (is_dir($fullPath)) {
            if (file_exists($fullPath . '/' . 'index.php'))   $indexFiles[] = [$file => $fullPath . DIRECTORY_SEPARATOR . 'index.php'];
            if (file_exists($fullPath . '/' . 'index.php'))   $indexFiles[] = [$file => $fullPath . DIRECTORY_SEPARATOR . 'index.php'];
        
        }
    }
    return $indexFiles;
}
$filesDir = findIndexFiles($curDir);
foreach ($filesDir as $items) {
    foreach ($items as $title => $link) {
        echo '<a href="' . $link . '"      target="_blank"    >' . $title . '</a> </br>';
    }
}
