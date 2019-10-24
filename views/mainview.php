<?php
spl_autoload_register(function ($class_name) {
    $res=str_replace('\\','/',$class_name);
    include $_SERVER["DOCUMENT_ROOT"].'/'.$res.'.php';
});
$maincontroller=new controllers\MainController();
$maincontroller->mainControll();


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Test</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        Загрузить файл service: <input name="userfile" type="file" />
        Загрузить файл commission: <input name="userfile2" type="file" />
        <p><input type="submit" value="Отправить файл" name="go"/></p>
    </form>

</body>
</html>