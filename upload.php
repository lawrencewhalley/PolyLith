<?php
$puid = $_GET['id'];

if (isset($_POST['submited'])) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg', 'png', 'pdf');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 50000000){
                $fileNameNew = "product".$puid.".".$fileActualExt;
                $fileDestination = 'C:\xampp\htdocs\uploadedImages/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                Echo("successfully uploaded");
                header("location:adminView.php");
            }else{
            echo " your file is to big! ";
            }
        } else{
        echo "there was an error uploading your file!";
        }
    } else{
        echo "You cannot upload Files of this type";
    }   
} else{
    echo "there is no form";
}
?>