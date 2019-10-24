<?php
namespace models;

Class Subcategory extends dbconnect
{
    public function create($name,$description,$subcategory_key,$category_id)
    {


        $mysql=$this->dbconnect();
        $sql="INSERT INTO Subcategory (`name`,`description`,`subcategory_key`,`category_id`) VALUES ('".$name."','".$description."','".$subcategory_key."','".$category_id."')";
        $res=mysqli_query($mysql,$sql);
        if(! $res ) {
            die('Could not enter data: ' . mysqli_error($mysql));
        }

        mysqli_close($mysql);
        return;
    }

    public function getLastId()
    {
        $mysql=$this->dbconnect();
        $sql="SELECT max(id) FROM Subcategory";
        $result = mysqli_query($mysql,$sql);
        $res=mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $res['max(id)'] ;
    }
}


?>