<?php



class Connection
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $name = 'testNotes';

    public function connection()
    {
        return mysqli_connect($this->host, $this->username, $this->password, $this->name);
    }
}