<?php
/**
 * Created by PhpStorm.
 * User: george
 * Date: 20/3/2019
 * Time: 8:09 μμ
 */

class Portal
{
    function __construct()
    {
        $this->servername = "172.168.1.121";
        $this->username = "pithia";
        $this->password = 'hLFQnx5vmm6Syq7F';
        $this->dbname = "pithia";
    }

    function getAppsList(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {
           header("Location: http://apps.3gel.network/accesserror.html");
           exit();
        }
        mysqli_set_charset($conn,"utf8");

        $sql = "SELECT * FROM apps WHERE AppView='yes'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $ID_Array[] = $row['ID'];
                $AppName_Array[] = $row['AppName'];
                $AppDesc_Array[] = $row['AppDesc'];
                $AppStatus_Array[] = $row['AppStatus'];
                $AppIcon_Array[] = $row['AppIcon'];
                $AppURL_Array[] = $row['AppURL'];
            }

            if(mysqli_num_rows($result) > 0){
                $return_data = array();
                for ($x = 0; $x <= mysqli_num_rows($result); $x++) {
                    if($x >= mysqli_num_rows($result)){
                        break;

                    }
                    array_push($return_data, $ID_Array[$x]."(~)".$AppName_Array[$x]."(~)".$AppDesc_Array[$x]."(~)".$AppStatus_Array[$x]."(~)".$AppIcon_Array[$x]."(~)".$AppURL_Array[$x]);

                }
                return $return_data;
            }else{
                return "404";
            }

        }else{
            return "404";
        }
    }

}