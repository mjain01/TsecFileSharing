<?php
$user="root";
$pass="";
$db=new mysqli('localhost',$user,$pass,'db');

if(isset($_GET['id'])) 
{
$id    = $_GET['id'];
$query = "SELECT name, type, size, content " .
         "FROM upload WHERE id = '$id'";

$result = $db->query($query) or die('Error, query failed');
list($name, $type, $size, $content) =mysqli_fetch_array($result);

header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
echo $content;
exit;
}

?>