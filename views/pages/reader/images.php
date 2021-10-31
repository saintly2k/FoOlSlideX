<?php
        /*$imagesDirectory = $imageFolder;
 
        if(is_dir($imagesDirectory))
        {
            $opendirectory = opendir($imagesDirectory);

            while (($image = readdir($opendirectory)) !== false)
            {
                if(($image == '.') || ($image == '..'))
                {
                    continue;
                }

                $imgFileType = pathinfo($image,PATHINFO_EXTENSION);

                if(($imgFileType == 'jpg') || ($imgFileType == 'png') || ($imgFileType == 'jpeg'))
                {
                    echo "<img src='".$imagesDirectory.$image."' style='width:100%;'><br><br>";
                }
            }

            closedir($opendirectory);

        } */

$dirFiles = array();
// opens images folder
if ($handle = opendir($imageFolder)) {
    while (false !== ($file = readdir($handle))) {

        // strips files extensions      
        $crap   = array(".jpg", ".jpeg", ".JPG", ".JPEG", ".png", ".PNG", ".gif", ".GIF", ".bmp", ".BMP", "_", "-");    

        $newstring = str_replace($crap, " ", $file );   

        //asort($file, SORT_NUMERIC); - doesnt work :(

        // hides folders, writes out ul of images and thumbnails from two folders

        if ($file != "." && $file != ".." && $file != "index.php" && $file != "Thumbnails") {
            $dirFiles[] = $file;
        }
    }
    closedir($handle);
}

sort($dirFiles);
foreach($dirFiles as $file)
{
    echo "<img src='$imageFolder$file' alt='$newstring'' width='100%'><br><br>";
}
        ?>
