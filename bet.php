

<?php


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ipl_betting";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// code for signup connectivity 
	if(isset($_POST['teamnumber']))
	{
		session_start();
		$n=$_SESSION['suname'];	
		$o=$_POST['teamnumber'];
		$sql="select balance from signup where username='$n'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			if($row["balance"]<1000)
			{
				echo "<script type='text/javascript'>alert('insufficient balance!!!!')</script>";
			}
			else
			{
				
		$sql = "INSERT INTO play1 (username,teamname)
			VALUES (\"$n\", \"$o\")";
		if ($conn->query($sql) === TRUE)
		{	echo "<script type='text/javascript'>alert('Thank you for participating!!!!')</script>";
			//echo "New record created successfully";
			$conn->close();
		}
		else
		{
		//	echo "dxjknms";
		}
			}
		}
	}
	if(isset($_POST['update_balance']))
	{
			session_start();
			$n=$_SESSION['suname'];
			$te=$_POST['update_balance'];
		//	echo $n;
			//echo $te;
			$sql = "UPDATE signup SET balance= balance+'$te' WHERE username='$n' ";
			if($conn->query($sql))
			{
				echo "<script type='text/javascript'>alert('Update successfully!!!!')</script>"; 
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
    <a href="s.php" class="w3-bar-item w3-button">HOME</a>
	<a href="#login" class="w3-bar-item w3-button">Add Balance</a>
    <a href="#bet1" class="w3-bar-item w3-button">Current Bet 1</a>
    <a href="#admin" class="w3-bar-item w3-button">Current Bet 2</a>
   
   
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
  
    <center><h1 >ADD BALANCE</h1></center>
    <form  method="post" class="middle_login" >
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h2>Enter Amount<input type ="text" name="update_balance" class="middle_login" size="35">
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

<!--bet1 -->
<br>
  <div class="signup_div" id="bet1">
  
    <center><h1 ><b>CURRENT BET</b></h1></center>
    <form  method="post" class="signup_form">
	<br><br>
	<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; WHO WILL WIN MATCH  </h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	SRH:&nbsp;&nbsp; 1<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MUMBAI: 2
	<br>
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Bet in the favour of team no. <input type="text" size="2"  name="teamnumber">
	&nbsp;&nbsp;&nbsp;<input type="submit" name="click here" size="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(NOTE: Bet Cost is Rs1000)<br>
	
	<br>

	<br>
	<br>
	<br>
	</form>
    </div>

<!-- admin login-->
	<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="admin">
  <div class="adminlogin_div">
  
   <center><h1 ><b>CURRENT BET</b></h1></center>
    <form  method="post" class="signup_form">
	<br><br>
	<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  RUNS IN POWERPLAY   </h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Greater Than 50:&nbsp;&nbsp; 1<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Less Than or Equal to 50: 2
	<br>
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Bet. <input type="text" size="2"  name="teamnumber">
	&nbsp;&nbsp;&nbsp;<input type="submit" name="click here" size="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(NOTE: Bet Cost is Rs1000)<br>
	
	<br>

	</form>
    </div>





</body>
</html>
