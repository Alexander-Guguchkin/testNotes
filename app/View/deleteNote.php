<?php
require '../Controller/NoteController.php';
$json = file_get_contents('php://input');
$obj = json_decode($json, true);
$note = new NoteController();
$res = $note->deleteNote($obj['id']);
echo $res;