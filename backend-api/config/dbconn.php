<?php
class Database
{
    private $host='localhost';
    private $dbname='github_autocompletes';
    private $user='root';
    private $password='';
    private $port='3307';
    private $dbconn;    

    public function connect()
    {
        $this->dbconn = null;

        try {

            $this->dbconn = new PDO('mysql:host='.$this->host.';port='.$this->port.';dbname='.$this->dbname, $this->user, $this->password);
            $this->dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
            // echo "Database connected successfully!";          

        } catch (PDOException $e) {            
            echo "Connection Error: ".$e->getMessage();
        }
        return $this->dbconn;
    }
}
