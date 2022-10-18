<?php
    function file_upload($file) {
        if(isset($file)){
            $upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/server/assets/uploads/files/";
            $file_tmp = $file['tmp_name'];
            $ext = pathinfo($file['name'],PATHINFO_EXTENSION);

            $file_name = time() . "." . $ext;

            $expensions = array("jpeg","jpg","png", "pdf");
//            switch ($ext) {
//                case in_array($ext, $expensions):
//                    $upload_dir .= "images/";
//                    break;
//                case "pdf":
//                    $upload_dir .= "pdf/";
//                    break;
//                case "docx":
//                    $upload_dir .= "docx/";
//                    break;
//            }

            move_uploaded_file($file_tmp, $upload_dir . $file_name);
        return $file_name;
        }
    }

function avatar_upload($file) {
    if(isset($file)){
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/server/assets/uploads/images/";
        $file_tmp = $file['tmp_name'];
        $ext = pathinfo($file['name'],PATHINFO_EXTENSION);

        $file_name = time() . "." . $ext;

        $expensions = array("jpeg","jpg","png");

        move_uploaded_file($file_tmp, $upload_dir . $file_name);
        return $file_name;
    }
}

