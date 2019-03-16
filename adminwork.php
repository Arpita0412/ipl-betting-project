<?php


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ipl_betting";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// code for signup connectivity 
	if(isset($_POST['ans']))
	{
		$o=$_POST['ans'];
		
		$sql = "SELECT * FROM play1";
		$result = $conn->query($sql);
		$a="1";
		$b="2";
		if ($result->num_rows > 0)
		{
			// output data of each row
			while($row = $result->fetch_assoc())
			{
				$rowname=$row["username"];
				if($row["teamname"]==$a)
				{
					
					if($a==$o)
					{
						$te="1000";
						$sql = "UPDATE signup SET balance= balance+'$te' WHERE username='$rowname' ";
						if ($conn->query($sql) )
						{
							
							//	echo "Record updated successfully";
						}
					}
					else
					{
						
						$te="1000";
						$sql = "UPDATE signup SET balance= balance-'$te' WHERE username='$rowname' ";
						
						if ($conn->query($sql) === TRUE)
						{
								//echo "Record updated successfully";
						}
					}
				}
				else
				{
					if($b==$o)
					{
						
						$te="1000";
						$sql = "UPDATE signup SET balance= balance+'$te' WHERE username='$rowname' ";
						if ($conn->query($sql) === TRUE)
						{
								//echo "Record updated successfully";
						}
					}
					else
					{
						
						$te="1000";
						$sql = "UPDATE signup SET balance= balance-'$te' WHERE username='$rowname' ";
						if ($conn->query($sql) === TRUE)
						{
						//		echo "Record updated successfully";
						}
					}
				}
				
			}
			echo "<script type='text/javascript'>alert('Update Successfuly!!!!')</script>";
			$sql="delete from play1";
		//	$r=$conn->query($sql);
			if ($conn->query($sql) === TRUE)
			{
				//echo "Record updated successfully";
			}
			else{
				//	echo "lcweknmd";
			}
			
			
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
	<a href="#login" class="w3-bar-item w3-button">Update Balance for Bet 1</a>
    <a href="#bet1" class="w3-bar-item w3-button">Update Balance for Bet 2</a>
    
   
  </div>
</div>
  
<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
<img src="f.jpg" alt="Mountain View" style="width:1348px;height:626px;">
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
  
    <center><h1 >ENTER TEAM NO. WHO WILL WIN</h1></center>
    <form  method="post" class="middle_login" >
	<br>
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ANS : <input type="text" size="2"  name="ans">
	&nbsp;&nbsp;&nbsp;<input type="submit" value="UPDATE " size="30"><br>
	
	
	
	<br>
	<br>
	<br></h2>
	<br>
	<br>
	<br>
	</form>
    </div>

<!--bet1 -->
<br>
  <div class="login_div" id="bet1">
  
    <center><h1 >ENTER The Correct Option</h1></center>
    <form  method="post" class="middle_login" >
	<br>
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Option No. : <input type="text" size="2"  name="ans">
	&nbsp;&nbsp;&nbsp;<input type="submit" value="UPDATE " size="30"><br>
	
	
		
	<br>
	<br>	
	<br>
	<br>	
	<br>
	<br>	
	<br>
	<br>
	<br>
	<br>
	<br></h2>
	<br>
	<br>
	<br>
	</form>
    </div>
</body>
</html>
