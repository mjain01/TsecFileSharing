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

$sql = "INSERT INTO teacher (tname,tid,temail,tbr,tpass) VALUES ('$name', '$id', '$email','$br','$tpass');";
$db->query($sql); 
header("Refresh:1;url=signin.php/");
?>
</body>
</html> 