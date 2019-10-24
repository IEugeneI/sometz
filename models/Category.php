<?php
namespace models;

Class Category extends dbconnect
{
        public function create($name,$description,$category_key)
        {


            $mysql=$this->dbconnect();
            $sql="INSERT INTO Category (`name`,`description`,`category_key`) VALUES ('".$name."','".$description."','".$category_key."')";
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
            $sql="SELECT max(id) FROM Category";
            $result = mysqli_query($mysql,$sql);
            $res=mysqli_fetch_array($result,MYSQLI_ASSOC);
            return $res['max(id)'] ;
        }
}


?>