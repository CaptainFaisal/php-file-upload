<?php
if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    $a = Array();
    for($i=0;$i<count($file['name']);$i++){
        foreach($file as $key => $value){
            $a[$key] = $value[$i];
        }
        $fileName = $a['name'];
        $fileError = $a['error'];
        $fileTmpName = $a['tmp_name'];
        $tmp = explode(".",$fileName);
        $fileExtName = strtolower(end($tmp));
        $allowed = Array('png','jpg','jpeg');
        if(in_array($fileExtName,$allowed)){
            if($fileError === 0){
                $fileNameNew = uniqid("",true).".".$fileExtName;
                $destination = '../uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$destination);
                echo "File has been uploaded successfully!";
            }else{
                echo "Something went wrong! please try again.";
            }
        }else{
            echo "You can not upload this type of file.";
        }
    }
}
?>