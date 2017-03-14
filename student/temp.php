

<?php
$user='root';
$pass='';
$db='db';
//$comment="  ";
//$comment=$_POST["comment"];
//$tid=$_GET["tid"];
$sname=$_POST["name"];
$sid=$_POST["id"];
$semail=$_POST["email"];
$sbr=$_POST["br"];
$syear=$_POST["year"];
$spass=$_POST["pwd"];
//echo "goo going";
$db=new mysqli('localhost',$user,$pass,$db) or die("unabale to cinnect");
//$sql="select tbr from teacher where tid='$tid'";
//$result=$db->query($sql);
//list($ubr)=mysqli_fetch_array($result);
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

$sql = "INSERT INTO std (sname,sid,semail,sbr,syear,spass,sphoto) ".
"VALUES ('$sname', '$sid', '$semail', '$sbr','$syear','$spass','$content')";

$db->query($sql); 
//include 'library/closedb.php';
?>
<span style="font-color:blue;">
<?php echo "file has been uploaded";
?></span><?php
}
header("Refresh:1;url=ssignin.php");

?>
</div>
</body>
</html>
