<?php
    if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
        $extensions= array("jpeg","jpg","png");
      
        if(in_array($file_ext,$extensions)=== false){
            $errors[]="Dateiendung ungültig. Bitte lade nur ein .png, .jpg oder .jpeg Datei hoch.";
        }
      
        if($file_size > 1009000007152){
            $errors[]='Dein Bild ist zu groß.';
        }
      
        if(empty($errors)==true){
            if(!isset($kami)){
                $n=15;
                function getRandomString($n) {
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $randomString = '';
    
                    for ($i = 0; $i < $n; $i++) {
                        $index = rand(0, strlen($characters) - 1);
                        $randomString .= $characters[$index];
                    }
    
                    return $randomString;
                }
                $overkill = getRandomString($n);
                move_uploaded_file($file_tmp,"assets/covers/".$overkill.".".$file_ext);
                $kami = $overkill.".".$file_ext;
            }
        } else {
            print_r($errors);
        }
    }
?>
<html>

<body>
<br>
    <?php if(!isset($kami)) : ?>
    <p><b>Upload Cover-image</b></p>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <?php if(isset($kami)) : ?>
        <img src="assets/covers/<?php echo $kami; ?>" style="width:150px;border-radius: 5px;"><br>
        <?php endif; if(!isset($kami)) : ?>
        <input type="file" name="image" />
        <input type="submit" value="Upload Cover! (Do first, unsaved changes will get lost!)"/>
        <?php endif; ?>
    </form>

</body>

</html>
