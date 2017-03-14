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
        margin-left:  500px;
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
      <li><a href="#">NOTES</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
</div>
<h1 style="text-align:center; color:black;"><strong>SIGN IN FOR STUDENT</strong></h1>
<br>

<div id="mydiv" style="background:none;">
    <form  method="post">
        <span style="color:black;">
        <p class="name">ID:</p><input type="text" name="id" /><br><br>
        <p class="name">PASSWORD:</p><input type="password" name="pwd"></span>
        <br><br>
    <input type="submit" id="submit"/>
</div>
</form>
</body>
</html>
<?php
$user="root";
$pass="";
$db=new mysqli('localhost',$user,$pass,'db');
//echo "hellllllllllllllllllllllll";
 if(isset($_POST['id']))
 {
 $sid=$_POST["id"];
$spass=$_POST["pwd"];
// echo $sid;
 //echo $spass;
$sql="select sid from std where sid='$sid' and spass='$spass';";
//  $sql="select tid from teacher where tid='1' and tpass='123456789';";
$result=$db->query($sql);
//if(row["tpass"]==$tpass)
if ($result->num_rows > 0) 
{
	SESSION_START();
	$_SESSION['sid']=$sid;
	 header("Refresh:1;url=shome.php");

 }
 else
 {
	   // echo "EITHER YOUR ID OR PASSWORD IS WRONG";
		?>
		<script>
		alert( "EITHER YOUR ID OR PASSWORD IS WRONG");
		</script>
		<?php
		
	 	 header("Refresh:1;url=ssignin.php");

 }
 }
 ?>