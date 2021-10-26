<?php
class Database
{
    private $host;
    private $user;
    private $password;
    private $database;
    private $link;

    public function __construct($host, $user, $password, $database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect()
    {
        $this->link = new mysqli($this->host, $this->user, $this->password, $this->database);
        if (mysqli_connect_error()) return null;
        else return $this->link;
    }
}



