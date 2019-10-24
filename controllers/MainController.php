<?php
namespace controllers;

Class MainController
{
    public function mainControll()
    {
        if(isset($_POST['go']))
        {
            $new=new UploadFile($_FILES);
            $parsingFile=new ParsingFiles();
            $parsingFile->parsingFileService();
            $parsingFile->parsingCommision();
            $file1=$_SERVER["DOCUMENT_ROOT"].'/files/services.xml';
            $file2=$_SERVER["DOCUMENT_ROOT"].'/files/commissions.xml';
            unlink($file1);
            unlink($file2);

        }
    }
}




?>