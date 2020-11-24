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
    <title>Visitor Comments Two</title>
</head>
<body>
    <h2>Visitor Comments Two</h2>
    <hr>
    <?php
        $dir = "./comments";
        if(is_dir($dir)){
            if(isset($_POST['save'])){
                if(empty($_POST['name'])){
                    echo "Unknown Visitor\n";
                }else{
                    $saveString = stripslashes($_POST['name']) . "<br>\n";
                    $saveString .= stripslashes($_POST['email']) . "<br>\n";
                    $saveString .= date('r') . "<br>\n";
                    $saveString .= stripslashes($_POST['comment']) . "\n";
                    echo "\$saveString: $saveString<br>";
                    $currentTime = microtime();
                    echo "\$currentTime: $currentTime <br>";
                    $timeArray = explode(" ", $currentTime);
                    echo var_dump($timeArray) . "<br>";
                    $timeStamp = (float)$timeArray[1] + (float)$timeArray[0];
                    echo "\$timeStamp: $timeStamp<br>";
                    $saveFileName = "$dir\comment.$timeStamp.txt";
                    echo "\$saveFileName: $saveFileName<br>";
                    $fileHandle = fopen($saveFileName, "wb");
                    if($fileHandle === false){
                        echo "There was an error creating \"" . 
                        htmlentities ($saveFileName) . "\".<br>\n";
                    } else {
                        if (fwrite($fileHandle, $saveString) > 0){
                            echo "Successfully wrote to file \"". 
                            htmlentities($saveFileName) . "\"<br>\n";
                        } else {
                            echo "There was an error writing to \"" . 
                            htmlentities($saveFileName) . "\".<br>\n";
                        }
                        fclose($fileHandle);
                    }
                }
            }
        }
    ?>
    <form action="VisitorCommentsTwo.php" method="post">
        Your name: <input type="text" name="name"><br>
        Your email: <input type="email" name="email"><br>
        <textarea name ="comment" rows="6" cols="100"></textarea><br>
        <input type="submit" name="save" value="Submit your comment"><br>
    </form>
</body>
</html>