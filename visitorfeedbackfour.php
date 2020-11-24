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
                    $fileHandle = fopen($dir . "/" . $fileName, "rb");
                    if($fileHandle === false){
                        echo "Ther was an error reading the file \"$fileName\".<br>\n";
                    } else{
                        $from = fgets($fileHandle);
                        echo "From: " . htmlentities($from) . "<br>\n";
                        $email = fgets($fileHandle);
                        echo "Email Address: " . htmlentities($email) . "<br>\n";
                        $date = fgets($fileHandle);
                        echo "Date: " . htmlentities($date) . "<br>\n";
                        $comment = "";
                        while (!feof($fileHandle)){
                            $comment .= fgets($fileHandle);
                        }
                        echo htmlentities($comment) . "<br>\n";
                    echo "</hr>\n";
                    fclose($fileHandle);
                    }
                }
            }
        }
    ?>
</body>
</html>