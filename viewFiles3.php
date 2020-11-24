<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--
        Author: Jordan Gillispie
        Date: 11/17/20
        Assignment: Files & Perms
    -->
    <title>View Files3</title>
</head> 
<body>
    <h2>View Files3</h2>
    <?php
        $dir = "../Exercise 02_05_01";
        $dirEntries = scandir($dir);
        echo "<table border='1' width='100%'>\n";
        echo "<tr><th colspan='4'>Directory Listing for <strong>" .
        htmlentities($dir) . "</strong></th></tr>\n";
        echo"<tr>";
        echo"<th><strong><em>Name</em></strong></th>";
        echo"<th><strong><em>Owner</em></strong></th>";
        echo"<th><strong><em>Permissions</em></strong></th>";
        echo"<th><strong>Size<em></em></strong></th>\n";
        echo"</tr>\n";
        foreach ($dirEntries as $entries) {
            if (strcmp($entries, '.') !== 0 && strcmp($entries, '..') !== 0){
                $fullEntryName = $dir . "/" . $entries;
                echo "<tr><td>";
                if(is-file($fullEntryName)){
                    echo "<a href=\"$fullEntryName\">" . 
                    htmlentities($entries)
                    . "</a>";
                } else {
                    echo htmlentities($entries);
                }
                echo "</td><td align = 'center'>" . 
                fileowner($fullEntryName);
            }
            if(is_file($fullEntryName)){
                $perms = fileperms($fullEntryName);
                $perms = decoct($perms % 01000);
                echo "<td><td align='center'>0$perms";
                echo "<td><td align='right'>" . 
                number_format(filesize($fullEntryName), 0) . "
                bytes";
            } else {
                echo "</td><tr>\n";
            }
        }
        echo "</table>\n";
        closedir($openDir);
    ?>
</body>
</html>