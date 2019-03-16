
<?php


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ipl_betting";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	
	
	// code for signup connectivity 
	if(isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['username'])&&isset($_POST['mobileno']))
	{
		
		$n=$_POST['username'];	
		$p=$_POST['password'];
		$e=$_POST['email'];
		$m=$_POST['mobileno'];
		$a11=$_POST['ans11'];
		if(strlen($n)<=0||strlen($p)<=0||strlen($e)<=0||strlen($m)<=0||strlen($a11)<=0)
		{
				   echo "<script type='text/javascript'>alert('All field are Required!!!!')</script>";
		}
		else if($a11!="gravityspoo")
		{
					
				 echo "<script type='text/javascript'>alert('Enter Right Text!!!!')</script>";
		}
		else if(!preg_match("/^[a-zA-Z ]*$/",$n))
		{
		//	echo "aikesh";
			//  echo "<script type='text/javascript'>alert('All field are Required!!!!')</script>";
			  echo "<script type='text/javascript'>alert('USERNAME only consist of A-Z && a-z!!!!')</script>";
		}
		

		else if(!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/",$e))
		{
			echo "<script type='text/javascript'>alert('Invalid email address!!!!')</script>";
		}
		else if(strlen($m)!=10)
		{
			echo "<script type='text/javascript'>alert('Invalid Mobile Number!!!!')</script>";
		}
		else
		{
	//		echo"kclw";
		$o="9090";
		$sql = "INSERT INTO signup (username,email,mobileno,balance,password)
			VALUES (\"$n\", \"$e\", \"$m\",\"$o\",\"$p\")";

		if ($conn->query($sql) === TRUE)
		{	
			echo "<script type='text/javascript'>alert('SIGNUP Successfully!!!!')</script>";
			//echo "New record created successfully";
			$conn->close();
		}
		}
	}
	
	
	// code for login connectivity
	if(isset($_POST['passwordlogin'])&&isset($_POST['usernamelogin']))
	{
		$n=$_POST['usernamelogin'];	
		$p=$_POST['passwordlogin'];
		
		$sql = "select * from signup where username='$n' and password='$p' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			session_start();
			$_SESSION['suname']=$n;
			//echo $_SESSION['suname'];
			header("Location: bet.php");
		
		}
		else
		{
				   echo "<script type='text/javascript'>alert('Invalid user!!!!')</script>";
		}
	}
	
	
	// code for adminlogin connectivity
	if(isset($_POST['passwordadmin'])&&isset($_POST['usernameadmin']))
	{
		$n=$_POST['usernameadmin'];	
		$p=$_POST['passwordadmin'];
		
	//	$sql = "select * from signup where username='$n' and password='$p' ";
	//$result = $conn->query($sql);
		if ($n=="pocket_tank" && $p=="zxc") {
			header("Location: adminwork.php");
		}
		else 
		{
			   echo "<script type='text/javascript'>alert('Invalid Admin!')</script>";
		}
	}
	
	
?>


<!DOCTYPE html>
<html>
<title>ONLINE IPL BETTING</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="a1.css">
<style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
.menu {display: none}
.bgimg {
    background-repeat: no-repeat;
    background-size: cover;
    background-image: url("/w3images/pizza.jpg");
    min-height: 90%;
}
.login_div {
    
    background-color:#E9967A;
    padding: 20px 10px 25px 70px;

}
.adminlogin_div {
    
    background-color:#E9968A;
    padding: 20px 210px 425px 80px;

}
.signup_div {
    
    background-color:#E9969A;
    padding: 30px 110px 225px 90px;

}

.about_div {
    
    background-color:#E9966A;
    padding: 30px 110px 225px 90px;

}
.signup_form {
    font-size: 25px;

}

#submit {
  position: relative;
  top: -48px;
  left: 150px;
}

</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top w3-hide-small">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="" class="w3-bar-item w3-button">HOME</a>
	<a href="#login" class="w3-bar-item w3-button">LOGIN</a>
    <a href="#signup" class="w3-bar-item w3-button">SIGNUP</a>
    <a href="#admin" class="w3-bar-item w3-button">ADMIN LOGIN</a>
    <a href="#about" class="w3-bar-item w3-button">ABOUT US</a>
   
  </div>
</div>
  
<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
<img src="f2.jpg" alt="Mountain View" style="width:1348px;height:626px;">
  <div class="w3-display-bottomleft w3-padding">
  <br>
   <span class="w3-tag w3-xlarge">BETTING ONLY FOR INDIANS</span>
  </div>
  <div class="w3-display-middle w3-center">
  </div>
</header>

<!-- LOGIN -->
<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="login">
  <div class="login_div">
  
    <center><h1 >LOGIN</h1></center>
    <form  method="post" class="middle_login" >
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h2>USERNAME: <input type ="text" name="usernamelogin" class="middle_login" size="35">
	<br><br>PASSWORD: <input type="password" name="passwordlogin" size="35">
	
	
	
	<br>
	<br>
	<br>
	<input type="submit" value="    SUBMIT   "  id="submit">
	<br></h2>
	<br>
	<br>
	<br>
	</form>
    </div>

<!--signup -->
<br>
  <div class="signup_div" id="signup">
  
    <center><h1 ><b>SIGNUP</b></h1></center>
    <form  method="post" class="signup_form">
	<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USERNAME: <input type ="text" name="username" size="30"><br>
	<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PASSWORD: <input type="password" name="password" size="30"><br>
	<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EMAIL: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" size="40"><br>
	<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MOBILE NO: <input type="text" name="mobileno" size="25">
	<br>
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<img src="qwe.jpeg" alt="GRAVITYSPOO" height="100" width="100" position="relative">
	<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Text As shown in image
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Write: <input type="text" name="ans11"><br>
	<br>

	<br>
	
	<input type="submit" value="    SUBMIT   "  id="submit">
	<br>

	<br>
	<br>
	<br>
	</form>
    </div>

<!-- admin login-->
	<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="admin">
  <div class="adminlogin_div">
  
   <center><h1 ><b>ADMIN LOGIN</b></h1></center>
    <form  method="post" class="middle_login" >
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h2>USERNAME: <input type ="text" name="usernameadmin" class="middle_login" size="35">
	<br><br>PASSKEY : &nbsp;&nbsp;&nbsp;<input type="password" name="passwordadmin" size="35">
	
	
	
	<br>
	<br>
	<br>
	<input type="submit" value="    SUBMIT   "  id="submit">
	<br></h2>
	<br>
	<br>
	<br>
	</form>
    </div>

<!-- About Container -->
<div  id="about">
  <div class="about_div">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">About</h1>
    <p>IPL cricket betting is easily accessible online. There is currently only one quality bookmaker that accepts Indian 
	bettors as well as Indian Rupees. Since the IPL has developed into a worldwide phenomenon with a large international interest, you will find
	IPL betting at several online bookmakers. However, as Indian punters we prefer Bet365. Not only
	are they one of only a few sites that accept INR for deposit, they also have the best selection of IPL lines available, 
	and are the MOST TRUSTED of sites accepting Indian bettors.</p>
	<br>
	<br>
	<br>
	<br>
	<br>
    
  </div>
</div>



</body>
</html>
