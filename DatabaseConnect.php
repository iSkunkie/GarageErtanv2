<?php
/*
 * Verbinden
 * SQL commandos versturen (data teruggeven)
 *
 */

class DatabaseConnectie{
    private $dbname;
    private $username, $password;
    private $IP;
    private $DBconnectie;

    function __construct($dbname, $username, $password, $IP)
    {
        $this->username = $username;
        $this->dbname = $dbname;
        $this->password = $password;
        $this->IP = $IP;
    }

    public function Connect()
    {
        $this->DBconnectie = new PDO("mysql:host=". $this->IP . ";dbname=" . $this->dbname ,
            $this->username, $this->password);
    }

    public function SQLCommando($sql, $waarden)
    {
        $query = $this->DBconnectie->prepare($sql);
        $query->execute($waarden);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}