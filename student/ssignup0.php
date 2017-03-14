<html>
<body>
<?php
$sname=$_POST["name"];
$sid=$_POST["id"];
$semail=$_POST["email"];
$sbr=$_POST["br"];
$syear=$_POST["year"];
$spass=$_POST["pwd"];
//echo $name;
$user="root";
$pass="";
$db=new mysqli('localhost',$user,$pass,'db');
/*$sql="INSERT INTO teacher (name,id,email,branch)
VALUES ('sc',121,'sacs','se');";
if(mysqli_query($db,$sql)) 
	echo "successful";
*/
$sql="INSERT INTO std (sname,sid,semail,sbr,syear,spass)
VALUES (?,?,?,?,?,?);";

$stmt = $db->prepare($sql);
$stmt->bind_param("sissss", $sname, $sid, $semail,$sbr,$syear,$spass);
$stmt->execute();
session_start();

header("Refresh:1;url=ssignin.php");
?>
</body>
</html> 