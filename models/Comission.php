<?php
namespace models;

Class Comission extends dbconnect
{
    public function create($amount_from,$amount_to,$comission_id,$date_from,$date_to,$fixed,$max,$min,$percent,$priority,$time_from,$time_to,$service_id)
    {


        $mysql=$this->dbconnect();
        $sql="INSERT INTO Comission (`amount_from`,`amount_to`,`commission_id`,`date_form`,`date_to`,`fixed`,`max`,`min`,`percent`,`priority`,`time_from`,`time_to`,`service_id`) VALUES ('".$amount_from."','".$amount_to."','".$comission_id."','".$date_from."','".$date_to."','".$fixed."','".$max."','".$min."','".$percent."','".$priority."','".$time_from."','".$time_to."','".$service_id."')";
        $res=mysqli_query($mysql,$sql);
        if(! $res ) {
            die('Could not enter data: ' . mysqli_error($mysql));
        }

        mysqli_close($mysql);
        return;
    }
}


?>