<?php 

include "koneksi.php";

   
    $original_file=$_FILES['file'];
    //var_dump($original_file);
    $get_type_file=pathinfo($original_file["name"],PATHINFO_EXTENSION);
    $get_type_name=strtolower(str_replace(" ", "-", $original_file['name']));
   
    if($get_type_file=="doc" || $get_type_file == "docx" || $get_type_file == "pdf") {
        if($get_type_file=="doc") { $type_file=".doc"; }
        elseif ($get_type_file=="docx") { $type_file=".docx"; }
        elseif ($get_type_file=="pdf") { $type_file=".pdf"; }
 
        $get_new_file=substr($get_type_name, 0, -4).'-'.round(microtime(true));
        $new_file_name=substr($get_new_file,0,85).$type_file;
 
        $new_directory=dirname(__DIR__).DIRECTORY_SEPARATOR . "file/";
        $new_file=$new_directory.$new_file_name;
 
        $isUploaded = move_uploaded_file($original_file['tmp_name'], $new_file);
 
        if($isUploaded) {
            $data = array(
                'status' => 1,
                'message' => 'Uploaded',
                'name' => $new_file_name
            );
        } else {
            $data = array(
                'status' => 0,
                'message' => '<li>Gagal mengunggah file</li>'
            );
        }
    } else {
        $data = array(
            'status' => 0,
            'message' => '<li>Hanya menerima format doc,docx,pdf</li>'
        );
    }
 
    header('Content-Type: application/json');
    echo json_encode($data);

