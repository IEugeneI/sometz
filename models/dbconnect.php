<?php
namespace models;

Class dbconnect
{
    private $dbhost="localhost";
    private $dbusername="root";
    private $dbpass="11111";
    private $dbname="local.print";


    public function dbconnect()
    {
        //dbconnect
        $conn = mysqli_connect($this->dbhost, $this->dbusername, $this->dbpass, $this->dbname);
        if (!$conn)
        {
            die("Connection failed: " . mysqli_connect_error());
        }
            //$result = $mysqli->query("SELECT * FROM Category");
        return $conn;

    }


}


?>