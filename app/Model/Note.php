<?php


require  '../bd/Connection.php';
class Note
{
    private $con;
    public function __construct()
    {
        $this->con = new Connection();
    }
    public function createQuery ($title, $content)
    {
        return mysqli_query($this->con->connection(), "INSERT INTO notes (title, content) VALUES ('$title', '$content')");
    }
    public function deleteQuery ($id)
    {
        return mysqli_query($this->con->connection(), "DELETE FROM notes WHERE id=$id");
    }
    public function getQuery ()
    {
        return mysqli_query($this->con->connection(), "SELECT * FROM notes");
    }
    public function getQueryLast ()
    {
        return mysqli_query($this->con->connection(), "SELECT * FROM notes ORDER BY id DESC LIMIT 1");
    }
}