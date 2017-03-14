<html>
<body>
<?php
$name=$_POST["name"];
$id=$_POST["id"];
$email=$_POST["email"];
$br=$_POST["br"];
$tpass=$_POST["pwd"];
//echo $name;
$user="root";
$pass="";
$db=new mysqli('localhost',$user,$pass,'db');

$sql = "INSERT INTO teacher (tname,tid,temail,tbr,tpass,tphoto) VALUES ('$name', '$id', '$email','$br','$tpass');";
$db->query($sql); 
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
$sql = "INSERT INTO teacher (tname,tid,temail,tbr,tpass,tphoto) VALUES ('$name', '$id', '$email','$br','$tpass','$content');";
$db->query($sql); 
//include 'library/config.php';
//include 'library/opendb.php';
}
header("Refresh:1;url=teachers/signin.php/");
?>
</body>
</html> 