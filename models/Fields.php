<?php
namespace models;

Class Fields extends dbconnect
{
    public function create($name,$hint,$heading,$format,$index_field,$min,$max,$service_id)
    {
        $name=str_replace("'","\'",$name);

        $mysql=$this->dbconnect();
        $sql="INSERT INTO Fields (`name`,`hint`,`heading`,`format`,`index_field`,`min`,`max`,`service_id`) VALUES ('".$name."','".$hint."','".$heading."','".$format."','".$index_field."','".$min."','".$max."','".$service_id."')";
        $res=mysqli_query($mysql,$sql);
        if(! $res ) {
            die('Could not enter data: ' . mysqli_error($mysql));
        }

        mysqli_close($mysql);
        return;
    }
}


?>