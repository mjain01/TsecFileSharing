<?php
$user="root";
$pass="";
$db=new mysqli('localhost',$user,$pass,'db');
//echo "hellllllllllllllllllllllll";
 $tid=$_POST["id"];
$tpass=$_POST["pwd"];
 //echo $tid;
 //echo $tpass;
$sql="select tid from teacher where tid='$tid' and tpass='$tpass';";
//  $sql="select tid from teacher where tid='1' and tpass='123456789';";
$result=$db->query($sql);
//if(row["tpass"]==$tpass)
if ($result->num_rows > 0) 
// while(list($tid) = mysqli_fetch_array($result))
{
	
	// echo $tid;

   SESSION_START();
	$_SESSION['tid']=$tid;
 ?>
<html>
<head>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="../teachers/mycss.css">

</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../home.php">TsecFileSharing</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../home.php">Home</a></li>
      <li><a href="">MESSAGES </a>
        
       
      </li>
      <li><a href="">UPLOADS</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
<h1 style="text-align:center; color:black;">SIGN IN FOR TEACHER</h1>
<br>
  
<div class="container">
</div>
<div id="mydiv" style="background:none; color:black;">
<form action="tsignin0.php">
<p>ID      :</p><input type="text"/><br>
<p>PASSWORD:</p><input type="password">
<input type="submit" />
</div>
</form>
  
</body>
</html>
<?PHP
	
	 header("Refresh:1;url=thome.php");

}
 else
 {
	    echo "EITHER YOUR ID OR PASSWORD IS WRONG";
	 	 header("Refresh:30;url=signin.php");

 }
 ?>