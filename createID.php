<?php 
ob_start();
session_start();
if(!isset($_SESSION['pass']))
    header("location:register.php");
?>
<html>
<head>
<title>SBI online</title>
<style>
.content 
{ background-color:#0f315c;
  width:92%;
}
}
::placeholder 
{ color:white;
  opacity:0.3; 
  font-weight:normal;   
}
.space
{ width:96%;
  background:#021f43;
  height:27px;
  margin-left:0px;
  margin-top:10px;
}
.details
{ width:98%;
  background:#000033;
  height:572px;
  margin-left:0px;
  margin-top:5px; 
  padding-bottom:50px;
}
.sbi_tab
{ height:88px;
  width:1335px;
  background:#2479C4;  
}
.button2:hover 
{
  box-shadow: 0 12px 16px 0 rgba(255,255,255,0.24),0 17px 50px 0 rgba(255,255,255,0.24);
  transform:scale(1.03);
  color:white;
}
.button1:hover 
{
  box-shadow: 0 12px 16px 0 rgba(255,255,255,0.24),0 17px 50px 0 rgba(255,255,255,0.24);
  transform:scale(1.03);
  color:white;
}
</style>
<?php
if(isset($_POST['submit']))
  {  if($_POST['pass']==$_POST['c_pass'])
       {  $conn=new mysqli("localhost","root","","sbi");
          $test=mysqli_query($conn,"SELECT * FROM ac_list WHERE ac_no='".$_SESSION['pass']."'");
          if($test==true)
               echo '<script>alert("You are already registered")</script>';
          mysqli_query($conn,"INSERT INTO ac_list (user,pass,ac_no) VALUES('".$_POST['un']."','".$_POST['pass']."','".$_SESSION['pass']."')");
       }  
     else
       echo '<script>alert("Password did not matched, enter same password")</script>';
  }
?>
</head>
<body>
<p id="test"></p>
<div class="sbi_tab">
<img style="margin-left:440" src="sbi-logo.png" height="50" width="55" align="left">
<b><font size=40 color=white>State Bank of India</font></b>
<font size=5 color=white><center>e-banking</center></font>
</div>
<img  src="sbi-o.png" height="40" width="120" align="left" style="margin-top:14px">
<font size="7" color= face="Calibri" style="padding-top:100px;margin-left:240px">Create personal ID and Password</font> 
<img  src="Aadhar.png" height="57" width="100" align="right" style="margin-top:14px"><br>
<b><i><font size=4 color=#6BB1F0 face="Calibri" style="margin-left:50px">ONLINE</font></i></b>
<div class="sbi_tab" style="padding:10px;height:22px;width:180px;background:#CFE8FE" align="left"><font face="Calibri" size=4 color=#034886>Create ID Password</font></div>
<img style="margin-top:-46px;margin-right:1105px" src="arrow.png" height="50" width="60" align="right">
<div class="sbi_tab" style="padding:10px;height:22px;width:1123px;background:#CFE8FE;margin-left:190px;margin-top:-42px"></div><br>
<div class="details" style="padding-left:40px;margin-left:270px;width:65%"><br><font style="color:white">REGISTER</font><br>  
<div class="space" style="outline:none;background-color:#191970;width:94.9%;border:0px;padding-top:9px;text-align:left">
<font style="color:white">&nbsp;&nbsp;PERSONAL&nbsp; DETAILS</font></div><br>         
<div class="content" style="padding-left:25px;padding-top:17px;padding-bottom:17px;height:78%">
<font color=red face="Calibri">ALL fields are required</font><br><br>
<div style="position:relative;height:330px;width:470px;margin-left:150px;margin-top:20px;background:#53CF25;opacity:0.8">
      <form action="createID.php" method="post"><font face="Californian FB" color="white">
<br><br><br>
<font style="color:white;padding-left:60px;padding-right:88px">User Name*</font>
<input type="text" name="un" placeholder="User Name" style="outline:none;width:172;height:35;border:0px;background-color:white;color:green;padding-left:20px;opacity:0.5" maxlength="25">
<br><br>
<font style="color:white;padding-left:60px;padding-right:94px">Password *</font>
<input type="password" name="pass" placeholder="Password" style="outline:none;width:172;height:35;border:0px;background-color:white;color:green;padding-left:20px;opacity:0.5" maxlength="25">
<br><br>
<font style="color:white;padding-left:60px;padding-right:36px">Confirm Password *</font>
<input type="password" name="c_pass" placeholder="Password" style="outline:none;width:172;height:35;border:0px;background-color:white;color:green;padding-left:20px;opacity:0.5" maxlength="25">
<br><br>
<br>
<button class="button1" type="submit" name="submit" style="margin-left:100px;background:blue;border:none;height:35px;width:110;color:white">Submit</button>
<button class="button1" type="reset" name="reset" style="margin-left:30px;background:blue;border:none;height:35px;width:110;color:white">Reset</button>
</form>
</div>
</div></div>
<div class="sbi_tab" style="background:#2C2D30;height:150px">
<img style="margin-left:20px;margin-top:10px" src="Verisign.png" height="90" width="150" align="left">
<ul type="square"  style="margin-left:190px;padding-top:22px"><font color="white" face="Calibri">
<li>Mandatory fields are marked with an asterisk (*)</li>
<li>Do not provide your username and password anywhere other than in this page</li>
<li>Your username and password are highly confidential.Never part with them.<b>SBI</b> will never ask for this information.</li>
</font></ul><br>
<font color="white" face="Calibri" style="margin-left:25px">This site is certified by Verisign as a secure and trusted site. All information sent or received in this site is encrypted using 256-bit encryption
</div>
<div class="sbi_tab" style="background:#171718;height:35px;width:1320px;padding-left:15px;padding-top:15px">
<font color="white">Copyright : State Bank of India</font>
</div>
</body>
</html>