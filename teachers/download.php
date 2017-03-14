<?php
$user="root";
$pass="";
$db=new mysqli('localhost',$user,$pass,'db');

if(isset($_GET['id'])) 
{
// if id is set then get the file with the id from database
//include 'library/config.php';
//include 'library/opendb.php';
$id    = $_GET['id'];
//$name=$_GET['name'];
//echo $name;
$query = "SELECT name, type, size, content " .
         "FROM upload WHERE id = '$id'";

$result = $db->query($query) or die('Error, query failed');
list($name, $type, $size, $content) =mysqli_fetch_array($result);

header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
echo $content;

//include 'library/closedb.php'; 
exit;
}

?>