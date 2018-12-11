<?php
    function DBconnectUsers($userType){
        
        $host = "tsuts.tskoli.is";
        $db = "0803992199_verk7";
        
        
        if($userType = 'read'){
            $user = '0803992199';
            $pwd = 'mypassword';
        }
        else if($userType = 'write'){
            $user = '0803992199';
            $pwd = 'mypassword';
        }
        
        //connect to database
        try {
            $UserConn = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            // set the PDO error mode to exception
            $UserConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }//try
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            }//catch
        return $UserConn;
        
    }
    
?>