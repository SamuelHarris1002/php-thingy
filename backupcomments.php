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
    <title>Backup Comments</title>
</head>
<body>
    <h2>Backup Comments</h2>
    <?php
        $source = "./comments";
        $destination = "./backups";
        if (!is_dir(@destination)){
            echo "The backup directory \Destination\" does not exist.\n";
        }else{
            if(is_dir($source)){
                echo "THe source directory \"$sorce\" does exist.\n";
                $totalFiles = 0;
                $filesMoved= 0;
                $$dirEntries = scandir($source);
                forEach ($dirEntries as $entry){
                    if ($entry !== "." && sentry !== ".."){
                        ++$totalFiles;
                        if(copy("$source/$entry", "$destination/$entry")){
                            ++$filesMoved;
                        }else{
                            echo "Could not move file \"" . htmlentities($entry) . "\".<br>\n";
                        }
                    }
                }
                echo "<p>$filesMoved of $totalFiles files successfully backed up.</p>\n";
            } else{
                echo "the source directory \"$source\" does not exist.\n";
            }
        }
    ?>
</body>
</html>

