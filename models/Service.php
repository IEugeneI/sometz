<?php
namespace models;

Class Service extends dbconnect
{
    public function create($service_id,$service_key,$amount_min,$amount_max,$name,$description,$template,$subcategory_id)
    {


        $mysql=$this->dbconnect();
        $sql="INSERT INTO Service (`service_id`,`service_key`,`amount_min`,`amount_max`,`name`,`description`,`template`,`subcategory_id`) VALUES ('".$service_id."','".$service_key."','".$amount_min."','".$amount_max."','".$name."','".$description."','".$template."','".$subcategory_id."')";
        $res=mysqli_query($mysql,$sql);
        if(! $res ) {
            die('Could not enter data: ' . mysqli_error($mysql));
        }

        mysqli_close($mysql);
        return;

    }
}


?>