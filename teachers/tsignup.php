<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="mycss.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   
   </head>
    <style>
    #mydiv
        {
margin-left: 500px;      
        font-size: 20px;
            color:black;
            font-weight: bold;
            
        }
        </style>
<body id="b">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../home.php">TsecFileSharing</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../home.php">Home</a></li>
      <li><a href="">MESSAGES</a>
        
       
      </li>
      <li><a href="">upload</a></li>
      <li><a href="">my notes</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

<h1 style="text-align:center; color:black">SIGN UP FOR TEACHER</h1>
    
<br>


<div id="mydiv" style="background:none">
<form  method="post"  enctype="multipart/form-data">
<p>Name    :</p> <input type="text" name="name" /><br>
<p>id      :</p><input type="text" name="id" /><br>
<p>branch  :</p> <input type="radio" name="br" value="it"> IT</input> <input type="radio" name="br" value="cs"> CS</input><br>
<p>email   :</p> <input type="text" name="email" /><br>
<p>password:</p><input type="password" name="pwd"></br>
<p>photo    :</p><input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<input name="userfile" type="file" id="userfile"> 
<input type="submit" name="upload" />
</form>
</div>
</body>
</html> 
<?php
$user='root';
$pass='';
$db='db';
//$comment="  ";
//$comment=$_POST["comment"];
//$tid=$_GET["tid"];

//echo "goo going";
$db=new mysqli('localhost',$user,$pass,$db) or die("unabale to cinnect");
//$sql="select tbr from teacher where tid='$tid'";
//$result=$db->query($sql);
//list($ubr)=mysqli_fetch_array($result);
if(isset($_POST['upload'])&& $_FILES['userfile']['size'] > 0 )
{
	//echo "upload";

	$tname=$_POST["name"];
$tid=$_POST["id"];
$temail=$_POST["email"];
$tbr=$_POST["br"];
$tpass=$_POST["pwd"];
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


header("Refresh:1;url=signin.php");
}
?>