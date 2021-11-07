<?php

function uploadFile ($file_field = null, $check_image = false, $random_name = false) {

    //Config Section    
    //Set file upload path
    $path = 'assets/covers/'; //with trailing slash
    //Set max file size in bytes
    $max_size = 1000000;
    //Set default file extension whitelist
    $whitelist_ext = array('jpeg','jpg','png','gif');
    //Set default file type whitelist
    $whitelist_type = array('image/jpeg', 'image/jpg', 'image/png','image/gif');
    
    //The Validation
    // Create an array to hold any output
    $out = array('error'=>null);
    
    if (!$file_field) {
      $out['error'][] = "Please specify a valid form field name";           
    }
    
    if (!$path) {
      $out['error'][] = "Please specify a valid upload path";               
    }
    
    if (count($out['error'])>0) {
      return $out;
    }
    
    //Make sure that there is a file
    if((!empty($_FILES[$file_field])) && ($_FILES[$file_field]['error'] == 0)) {
    
    // Get filename
    $file_info = pathinfo($_FILES[$file_field]['name']);
    $name = $file_info['filename'];
    $ext = $file_info['extension'];
    
    //Check file has the right extension           
    if (!in_array($ext, $whitelist_ext)) {
      $out['error'][] = "Invalid file Extension";
    }
    
    //Check that the file is of the right type
    if (!in_array($_FILES[$file_field]["type"], $whitelist_type)) {
      $out['error'][] = "Invalid file Type";
    }
    
    //Check that the file is not too big
    if ($_FILES[$file_field]["size"] > $max_size) {
      $out['error'][] = "File is too big";
    }
    
    //If $check image is set as true
    if ($check_image) {
      if (!getimagesize($_FILES[$file_field]['tmp_name'])) {
        $out['error'][] = "Uploaded file is not a valid image";
      }
    }
    
    //Create full filename including path
    if ($random_name) {
      // Generate random filename
      $tmp = str_replace(array('.',' '), array('',''), microtime());
    
      if (!$tmp || $tmp == '') {
        $out['error'][] = "File must have a name";
      }     
      $newname = $tmp.'.'.$ext;                                
    } else {
        $newname = $name.'.'.$ext;
    }
    
    //Check if file already exists on server
    if (file_exists($path.$newname)) {
      $out['error'][] = "A file with this name already exists";
    }
    
    if (count($out['error'])>0) {
      //The file has not correctly validated
      return $out;
    } 
    
    if (move_uploaded_file($_FILES[$file_field]['tmp_name'], $path.$newname)) {
      //Success
      $out['filepath'] = $path;
      $out['filename'] = $newname;
      $kami = $newname;
      return $out;
    } else {
      $out['error'][] = "Server Error!";
    }
    
     } else {
      $out['error'][] = "No file uploaded";
      return $out;
     }      
    }
    
    
    if (isset($_POST['submit'])) {
     $file = uploadFile('file', true, true);
     if (is_array($file['error'])) {
      $message = '';
      foreach ($file['error'] as $msg) {
      $message .= '<p>'.$msg.'</p>';    
     }
    } else {
     $message = "File uploaded successfully".$newname;
    }
     echo $message;
    }

    ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <input name="file" type="file" id="imagee" />
    <input name="submit" type="submit" value="Upload" />
</form>