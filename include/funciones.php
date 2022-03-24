<?php
function conectarse ()
{
$db = new mysqli('localhost', 'horarios_escolares', 'horarios_escolares', 'horarios_escolares');
if ($db->connect_error) {
        die('Connect Error (' . $db->connect_errno . ') '
            . $mysqli->connect_error);
} 
return ($db);
}