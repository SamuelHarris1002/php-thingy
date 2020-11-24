<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--
        Author: Jordan Gillispie
        Date: 11/17/20
        Assignment: Files & Perms
    -->
    <title>Visitor Feedback</title>
</head>
<body>
    <h2>Visitor Feedback</h2>
    <?php
        $dir = "./comments";
        if(is_dir($dir)){
            $commentFiles = scandir($dir);
            foreach ($commentFiles as $fileName) {
                if ($fileName !== "." && $fileName !== ".."){
                    echo "From <strong>$fileName</strong><br>";
                    $comment = file($dir . "/" . $fileName);
                    echo "From: " . htmlentities($comment[0]) . "<br>\n";
                    echo "Email Address: " . htmlentities($comment[1]) . "<br>\n";
                    echo "Date: " . htmlentities($comment[2]) . "<br>\n";
                    $commentLines = count($comment);
                    for ($i = 3; $i < $commentLines; $i++){
                        echo htmlentities($comment[$i]) . "<br>\n";
                    }
                }
            }
        }
    ?>
</body>
</html>