<?php 
session_start();
if(!isset($_SESSION['ac_no']))
{ header("location:login.php");
}
if(isset($_GET['logout']))
{  session_destroy();
   header("location:login.php");
}
// hhhhhhhh
?>
<html>
<head>
<title>SBI online</title>
<style>
@keyframes slideranimation
{	0%
	{   left: 0px;      }
        20%
	{   left: 0px;      }
	25%
	{   left: -1352px;  }
        45%
	{   left: -1352px;  }
	50%
	{   left: -2704px;  }
        70%
	{   left: -2704px;  }
        75%
	{   left: -4056px;  }
        95%
	{   left: -4056px;  }
	100%
	{   left: 0px;  }
}
.screen
{ width:1332px;
  height:500px;
  overflow:hidden;
}
.anim
{ position:relative;
  width:5408px;
  z-index:-1;
  animation-name:slideranimation;
  animation-duration:20s;
  animation-iteration-count:infinite;
}
.triangle-down
{ width:0;
  height:0px;
  border-left:25px solid #191970;
  border-right:70px solid transparent;
  border-top:100px solid #191970;
}
.show
{ display:block;
  background-color:#DDD
}
::placeholder 
{ color:white;
  opacity:0.3; 
  font-weight:normal;   
}
.nav
{ width:100%;
  background:#000033;
  height:50px;
  margin-top:0px;
}
.newa:hover
{ color:#4169e1;
  transform:scale(1.1);
}
.anchor
{ width:170px;
  color:#191970;
  display:block;
  text-decoration:none;
  font-size:20px;
  text-align:center;
  border-radius=5px;
  font-family:High Tower Text;
  font-weight:bold;
}
.sbi_tab
{ height:88px;
  width:100%;
  background:#2479C4;  
}
button:hover
{ text-color:green;
  transform:scale(1.1);
}
</style>
</head>
<div class="sbi_tab">
<img style="margin-left:440" src="sbi-logo.png" height="50" width="55" align="left">
<b><font size=40 color=white>State Bank of India</font></b>
<font size=5 color=white><center>e-banking</center></font>
</div>
<img  src="sbi-o.png" height="40" width="120" align="left" style="margin-top:14px">
<font size="7" color= face="Calibri" style="padding-top:100px;margin-left:325px">Welcome to SBI online</font> 
<img  src="Aadhar.png" height="57" width="100" align="right" style="margin-top:14px"><br>
<b><i><font size=4 color=#6BB1F0 face="Calibri" style="margin-left:50px">ONLINE</font></i></b>
<div class="sbi_tab" style="padding:10px;height:22px;width:180px;background:#CFE8FE" align="left"><font face="Calibri" size=4 color=#034886>Home</font></div>
<img style="margin-top:-46px;margin-right:1123px" src="arrow.png" height="50" width="60" align="right">
<div class="sbi_tab" style="padding-left:80px;padding-top:8px;padding-bottom:10px;height:24px;width:1152px;background:#CFE8FE;margin-left:100px;margin-top:-42px">
<ul style="list-style:none;padding:0;margin:0;position:absolute">
   <li style="float:left;margin-top:2px;"><a class="anchor" href="home.php"><div class="newa">Home</div></a></li>
   <li style="float:left;margin-top:2px;"><a class="anchor" href="transaction.php"><div class="newa">Transactions</div></a></li>
   <li style="float:left;margin-top:2px;"><a class="anchor" href="TF.php"><div class="newa">Transfer Funds</div></a></li>
   <li style="float:left;margin-top:2px;"><a class="anchor" href="paybill.php"><div class="newa">Pay Bills</div></a></li>
   <li style="float:left;margin-top:2px;"><a target="_blank" class="anchor" href="contact.php"><div class="newa">Contact us</div></a></li>
   <li style="float:left;margin-top:2px;"><a target="_blank" class="anchor" href="about.php"><div class="newa">About us</div></a></li>
</ul>
<form><button type="submit" name="logout" style="margin-left:1025px;margin-top:-43px;background:#CFE8FE;border:none;outline:none;height:35px;width:100px;color:red"><b>Logout</b></button></form>
</div><br>
<div style="opacity:0.8;margin-left:0px;margin-top:270px;position:absolute;z-index:1;width:300px;height:100px;background:#191970"><div style="margin-top:30px;margin-left:40px"><font color="white" size="6">Banking on your tips</font></div></div>
<div class="triangle-down" style="opacity:0.8;margin-left:300px;margin-top:270px;position:absolute;z-index:1"></div>
<div style="opacity:0.3;margin-left:30px;margin-top:300px;position:absolute;z-index:1;width:300px;height:100px;background:white"></div>
<div class="triangle-down" style="opacity:0.3;margin-left:330px;margin-top:300px;position:absolute;z-index:1;border-left:25px solid white;border-right:70px solid transparent;border-top:100px solid white;"></div>
<div class="screen" style="margin-top:0px">
<div class="anim">
     <img style="float:left" src="1.jpg" height="500" width="1352">		
     <img style="float:left" src="2.jpg" height="500" width="1352">
     <img style="float:left" src="3.jpg" height="500" width="1352">
     <img style="float:left" src="4.jpg" height="500" width="1352">
  </div>
</div>
<div class="sbi_tab" style="background:#2C2D30;height:150px">
<img style="margin-left:20px;margin-top:10px" src="Verisign.png" height="90" width="150" align="left">
<ul type="square"  style="margin-left:190px;padding-top:22px"><font color="white" face="Calibri">
<li>Mandatory fields are marked with an asterisk (*)</li>
<li>Do not provide your username and password anywhere other than in this page</li>
<li>Your username and password are highly confidential.Never part with them.<b>SBI</b> will never ask for this information.</li>
</font></ul><br>
<font color="white" face="Calibri" style="margin-left:25px">This site is certified by Verisign as a secure and trusted site. All information sent or received in this site is encrypted using 256-bit encryption
</div>
<div class="sbi_tab" style="background:#171718;height:35px;width:1318px;padding-left:15px;padding-top:15px">
<font color="white">Copyright : State Bank of India</font>
</div>
</body>
</html>