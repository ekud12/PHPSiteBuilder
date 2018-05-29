<?php
//$numOfPhotos = count($_FILES);
$numOfPhotos = 5;
$photoImagePathArray = array();    

for($i = 1; $i <= $numOfPhotos; $i++) {
    try {
        if (!isset($_FILES["Site".$i."PhotoUpload"]['error']) || is_array($_FILES["Site".$i."PhotoUpload"]['error'])) {
            throw new RuntimeException('Invalid parameters.');
        }
        switch ($_FILES["Site".$i."PhotoUpload"]['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:  
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:     
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }
        if ($_FILES["Site".$i."PhotoUpload"]['size'] > 1000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
            $finfo->file($_FILES["Site".$i."PhotoUpload"]['tmp_name']),
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
            ),
            true
            )) {
                throw new RuntimeException('Invalid file format.');
        }

        $location = "../D_LielKaysari/ImagesUpload/".$_FILES["Site".$i."PhotoUpload"]['name'];
        if (!move_uploaded_file($_FILES["Site".$i."PhotoUpload"]['tmp_name'],"$location")) {
            throw new RuntimeException('Failed to move uploaded file.');
        }
    } catch (RuntimeException $e) {
        $error = true;
        //echo $e->getMessage();
    }
    $photoImagePathArray['Site'.$i.'PhotoUpload'] =  "../../D_LielKaysari/ImagesUpload/".$_FILES["Site".$i."PhotoUpload"]['name'];
}
    echo json_encode($photoImagePathArray);
?>