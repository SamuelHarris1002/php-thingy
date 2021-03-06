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
    <title>File Uploader</title>
</head>
<body>
    <h2>File Uploader</h2>
    <?php
        $dir = ".";
        if (isset($_POST['upload'])){
            if(isset($_FILES['oldFile'])){
                if(move_uploaded_file(
                    $_FILES['newFile']['tmp_name'], $dir . "/" . 
                    $_FILES['newFile']['name']) === true) {
                        chmod($dir . "/" . $_FILES['newFile']['name'], 0644);
                        echo "File \"" .htmlentities(
                            $_FILES['newFile']['name']) . "\"successfuly
                            uploaded.<br>\n";
            }else {
                echo "there was an error uploading \"".
                htmlentities($FILES['newFile']['name']) . 
                "\".<br>\n";
                }
            }
        }
    ?>
    <form action="FileUploader.php" method = "post"enctype= "multipart/form-data">
    <input type="hidden" name = "MAX_FILE_SIZE" value = "2500">
    File to upload:<br>
    <input type="file" name="newFile"><br>
    (25,000 byte limit)<br>
    <input type="submit" name = "upload" value = "Upload the File">
    <br>
    </form>
</body>
</html>

