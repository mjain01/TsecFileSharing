<?php
$user='root';
$pass='';
$db='db';
$comment="  ";
$comment=$_POST["comment"];
$tid=$_GET["tid"];

//echo "goo going";
$db=new mysqli('localhost',$user,$pass,$db) or die("unabale to cinnect");
$sql="select tbr from teacher where tid='$tid'";
$result=$db->query($sql);
list($ubr)=mysqli_fetch_array($result);
if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}
//include 'library/config.php';
//include 'library/opendb.php';

$sql = "INSERT INTO upload (name, size, type, content,comment,ubr ) ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$content','$comment','$ubr')";

$db->query($sql); 
//include 'library/closedb.php';
?>
<span style="font-color:blue;">
<?php echo "file has been uploaded";
?></span><?php
}
?>