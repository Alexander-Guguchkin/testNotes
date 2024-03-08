<?php
require '../Controller/NoteController.php';
$note = new NoteController();
$res = $note->getNote();
$data = [];
while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
}
$json_res = json_encode($data);
echo $json_res;
