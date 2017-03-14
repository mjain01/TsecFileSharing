

<?php
$user='root';
$pass='';
$db='db';
//$comment="  ";
//$comment=$_POST["comment"];
//$tid=$_GET["tid"];
$tname=$_POST["name"];
$tid=$_POST["id"];
$temail=$_POST["email"];
$tbr=$_POST["br"];
$tpass=$_POST["pwd"];
//echo "goo going";
echo "aaaaa";
$db=new mysqli('localhost',$user,$pass,$db) or die("unabale to cinnect");
//$sql="select tbr from teacher where tid='$tid'";
//$result=$db->query($sql);
//list($ubr)=mysqli_fetch_array($result);
if(	$_FILES['userfile']['size'] > 0)
{
	echo "file";
if(isset($_POST['upload']) )
{
	echo "upload";

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

$sql = "INSERT INTO teacher (tname,tid,temail,tbr,tpass,tphoto) ".
"VALUES ('$tname', '$tid', '$temail', '$tbr','$tpass','$content')";

$db->query($sql); 
//include 'library/closedb.php';
?>
<span style="font-color:blue;">
<?php echo "file has been uploaded";
?></span><?php
}
}
header("Refresh:1;url=signin.php");

?>
</div>
</body>
</html>
