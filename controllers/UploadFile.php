<?php
namespace controllers;
Class UploadFile
{
    public function __construct($files)
    {
        if (isset($files)&&!empty($files)){
            $uploaddir = $_SERVER["DOCUMENT_ROOT"].'/files/';
            $uploadfile = $uploaddir.'services.xml';
            $uploadfile2 = $uploaddir.'commissions.xml';
            if (move_uploaded_file($files['userfile']['tmp_name'], $uploadfile)) {
                if(move_uploaded_file($files['userfile2']['tmp_name'], $uploadfile2)) {
                    return;
                }else{
                    echo "Неправильно ввели файл!\n";
                }
            } else {
                echo "Неправильно ввели файл!\n";
            }

        }
    }
}




?>