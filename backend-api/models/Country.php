<?php
class Country
{
    private $dbconn;
    public function __construct($db)
    {
        $this->dbconn = $db;
    }

    public function search($keyword)
    {
        $sql = 'SELECT * FROM countries WHERE name like ? ORDER BY name ASC';
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute(array('%'.$keyword.'%'));
        return $stmt;
    }
}
