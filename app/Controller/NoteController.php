<?php
require '../Model/Note.php';
class NoteController
{
    private $note;
    public function __construct()
    {
        $this->note = new Note();
    }
    public function addNote($title, $content)
    {
       return $this->note->createQuery($title, $content);
    }
    public  function deleteNote($id)
    {
        return $this->note->deleteQuery($id);
    }
    public function getNote()
    {
       return $this->note->getQuery();
    }
    public function getNoteLast()
    {
        return $this->note->getQueryLast();
    }
}