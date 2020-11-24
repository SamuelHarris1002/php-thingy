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
    <title>File Dowloader</title>
</head>
<body>
    <?php
        $dir = "../Exercise 02_05_01";
        if(isset $GET['fileName']){
            $fileToGet = $dir . "/" . stripslashes($_Get['fileName']);
            if(is_readable($fileToGet)){
                header("Conten-Description: File Transfer:");
                header("Conten-Type: application/force-download");
                header("Conten-Disposition: attachment; filename=\"" . $_GET['fileName'] . "\"");
                header("Conten-Transfer-Encoding: base64");
                header("Conten-Length: " . filesize(@fileToGet));
                readfile($fileToGet);
                $showErrorPage = false;
                $errorMsg = "";
            } else {
                $errorMsg = "cannot read \"$fileToGet\"";
                $showErrorPage = true;
            }
        }else{
            $errorMsg = "No Filename Specified";
            $showErrorPage = true;
        }
        if($showErrorPage) {
    ?>
       <!php
    }
    ?>
    <h2>File Dowloader</h2>
    <p>Ther was an error downloading "<?php
    echo htmlentities($_GET['filename']); ?>"</p>
    <p><?php echo htmlentities($errorMsg);?></p>
</body>
</html>