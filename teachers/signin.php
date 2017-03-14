<html>
<head>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="jquery-2.2.2.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="../teachers/mycss.css">
<link rel="stylesheet" type="text/css" href="mystyle.css">
<style>
        #mydiv {
            margin: 10px;
            font-size: 18px;
            margin-left: 500px;
        }
        
        #mydiv input {
            width: 300px;
            border-radius: 5%;
        }
        
        #submit {
            background-color: green;
            border: none;
            color: #fff;
            height: 30px;
        }
        
        #submit:hover {
            background-color: #fff;
            border: none;
            color: green;
        }
    </style>
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
<form  method="post">
<p class="name">ID      :</p><input type="text" name="id" /><br>
<p class="name">PASSWORD:</p><input type="password" name="pwd"><br><br>
<input type="submit" id="submit" />
</form>
    </div>
</body>
</html>
<?php
if(isset($_POST["id"]))
{
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
	
	 header("Refresh:1;url=thome.php");

}
 else
 {
	    echo "EITHER YOUR ID OR PASSWORD IS WRONG";
	 	 header("Refresh:1;url=signin.php");

 }}
 ?>