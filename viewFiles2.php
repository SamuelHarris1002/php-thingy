<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--
        Author: Samuel harris
        Date: 11/17/20
        Assignment: Files & Perms
    -->
    <title>View Files2</title>
</head>
<body>
    <h2>View Files2</h2>
    <?php
        $dir = "../Exercise 02_05_01";
        $dirEntries = scandir($dir);
        foreach ($dirEntries as $entries) {
            if (strcmp($entries, '.') !== 0 && strcmp($entries, '..') !== 0){
            echo "<a href=\"$dir/$entries\">$curFile</a><br>\n";
            }
        }
        closedir($openDir);
    ?>
</body>
</html>