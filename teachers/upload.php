<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
  <?php 
session_start();

//$tid=$_SESSION["tid"];
$tid=$_SESSION["tid"];

  //$sid = $_GET['sid'];
  // do some validation here to ensure id is safe
  $user="root";
  $pass="";
  $db=new mysqli('localhost',$user,$pass,'db');
  
  $sql = "SELECT tname FROM teacher WHERE tid='$tid'";
  $result =$db->query($sql);
  //$row = mysql_fetch_assoc($result);
list($tname) = mysqli_fetch_array($result);
  mysqli_close($db);

  //header("Content-type: image/jpeg");
  //echo $tname;
?>
</head>
<body style="background-color:black;">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="thome.php?tid=<?php echo urlencode($tid); ?>">TsecFileSharing</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="thome.php?tid==<?php echo urlencode($tid);?>">Home</a></li>
      <li><a href="tmsg.php?tid=<?php echo urlencode($tid);?>">Messages</a>
        
       
      </li>
      <li><a href="upload.php?tid=<?php echo urlencode($tid); ?>">Upload</a></li>
	  	        <li><a href="vpn.php?tid=<?php echo urlencode($tid); ?>">MY NOTES</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
	      	<li><img src="photo.php?id=<?php echo urlencode($tid); ?>" width=40px height=40px style="padding-top:5px" /><span style="display:inline; white-space:nowrap; color:#9d9d9d;margin-top:50px;font-size:14px;line-height:10px">welcome <?php echo $tname; ?></span></li>

      <li><a href="../home.php"><span class="glyphicon glyphicon-user"></span> LOG OUT</a></li>
    </ul>
  </div>
</nav>
  <div style="margin-top:50;margin-left:470">
<form method="post" enctype="multipart/form-data">
<table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
<tr> 
<td width="246">
<span style="color:blue;">comments:<input type="text" name="comment" /><br>
<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<input name="userfile" type="file" id="userfile"> 
</td>
<td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
</tr>
</table>
</form>


<?php
$user='root';
$pass='';
$db='db';
$comment="  ";

$tid=$_GET["tid"];

$db=new mysqli('localhost',$user,$pass,$db) or die("unabale to cinnect");
$sql="select tbr from teacher where tid='$tid'";
$result=$db->query($sql);
list($ubr)=mysqli_fetch_array($result);
if(isset($_POST{"comment"}))
	{
$comment=$_POST["comment"];
	}
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

$sql = "INSERT INTO upload (name, size, type, content,comment,ubr,tid ) ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$content','$comment','$ubr','$tid')";

$db->query($sql); 
//include 'library/closedb.php';
?>
<span style="font-color:blue;">
<?php echo "file has been uploaded";
?></span><?php
	}
?>
</div>
</body>
</html>
