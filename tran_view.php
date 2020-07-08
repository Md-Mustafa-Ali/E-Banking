<?php 
ob_start();
session_start();
if(!isset($_SESSION['ac_no']))
    header("location:login.php");
if(isset($_GET['logout']))
  {  session_destroy();
     header("location:login.php");  }
?>
<html>
<head>
<title>SBI online</title>
<style>
.show
{ display:block;
  background-color:#DDD
}
.light
{ 
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
.button2:hover 
{
  box-shadow: 0 12px 16px 0 rgba(255,255,255,0.24),0 17px 50px 0 rgba(255,255,255,0.24);
  transform:scale(1.03);
  outline:none;
  color:white;
  border-radius:5px;
}
.button1:hover
{ transform:scale(1.1);
}
</style>
<?php
  $id=$_SESSION['ac_no'];
  $conn=new mysqli("localhost","root","","core_banking");
  if($conn->connect_error)
      die("Connection failed:".$conn->connect_error);
  $query="SELECT * FROM cb_dtb WHERE account_no='".$id."'";
  $result=mysqli_fetch_assoc(mysqli_query($conn,$query));
?>
</head>
<body>
<?php
  $table="tran_".$id."_".$_SESSION['month'];
  $conn2=new mysqli("localhost","root","","sbi");
  if($conn2->connect_error)
     die("Connection failed:".$conn2->connect_error);
  $query2="SELECT * FROM ".$table." ORDER BY date DESC";
  $result2=$conn2->query($query2);
  $row=$result2->num_rows;
?>
<div class="sbi_tab">
<img style="margin-left:440" src="sbi-logo.png" height="50" width="55" align="left">
<b><font size=40 color=white>State Bank of India</font></b>
<font size=5 color=white><center>e-banking</center></font>
</div>
<img  src="sbi-o.png" height="40" width="120" align="left" style="margin-top:14px">
<font size="7" color= face="Calibri" style="padding-top:100px;margin-left:440px">Transactions</font> 
<img  src="Aadhar.png" height="57" width="100" align="right" style="margin-top:14px"><br>
<b><i><font size=4 color=#6BB1F0 face="Calibri" style="margin-left:50px">ONLINE</font></i></b>
<div class="sbi_tab" style="padding:10px;height:22px;width:180px;background:#CFE8FE" align="left"><font face="Calibri" size=4 color=#034886>Transactions</font></div>
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
<form method="get" id="form1"><button class="button1" type="submit" name="logout" style="margin-left:1025px;margin-top:-43px;background:#CFE8FE;border:none;outline:none;height:35px;width:100px;color:red"><b>Logout</b></button></form>
</div><br>
<table width="100%" height="70%">
 <tr>
  <th width="27%" style="margin-left:0px;padding-top:50px">
   <div style="position:absolute;margin-top:-110px">
         <font color=white face="Times New Roman" style="font-weight:100">
              <div style="margin-left:100px;margin-top:-30px">Account Holder</div><br>
              <div style="margin-left:100px;margin-top:-5px;opacity:0.6"><?php echo $result['name'];?></div><br>
              <div style="margin-left:100px;margin-top:15px">Account Number</div><br>
              <div style="margin-left:100px;margin-top:-5px;opacity:0.6"><?php echo $result['account_no'];?></div>
              <div style="margin-left:100px;margin-top:30px">Account Balance</div><br>
              <div style="margin-left:100px;margin-top:-5px;opacity:0.6"><?php echo $result['balance'];?></div>
         </font>
   </div>
   <div style="margin-left:-40px;margin-top:-35px">
     <div class="sbi_tab" style="z-index:-1;position:absolute;height:380px;width:300px;background:#53CF25;margin-left:45px;margin-top:-180px"></div>
     <div class="sbi_tab" style="z-index:-1;position:absolute;opacity:0.4;height:300px;width:300px;background:#191970;margin-left:85px;margin-top:-140px;background-image:url('sbi-logo2.png');background-size:320px 300px;background-repeat:no-repeat;background-position:center""></div>
     <div class="sbi_tab" style="z-index:-1;position:absolute;opacity:0.3;height:35px;width:250px;background:white;margin-left:45px;margin-top:-82px"></div>
     <div class="sbi_tab" style="z-index:-1;position:absolute;opacity:0.3;height:35px;width:250px;background:white;margin-left:45px;margin-top:0px"></div>
     <div class="sbi_tab" style="z-index:-1;position:absolute;opacity:0.3;height:35px;width:250px;background:white;margin-left:45px;margin-top:80px"></div>
   </div>
  </th>
  <th width="73%" style="text-align:left;vertical-align:top">
   <div class="sbi_tab" style="padding-left:20px;padding-top:8px;padding-bottom:10px;height:24px;width:945px;background:#CFE8FE"><font face="Calibri" size=4 color=#034886>View Transactions</font></div>
   <br>
   <table align="left" width="100%" style="line-height:25px;border-collapse:collapse;border:1px solid black">
     <tr style="text-align:center;border:1px solid black">
      <th style="width:150px;background-color:#DDD">Date</th>
      <th style="border:1px solid black;background-color:#DDD">Transcation ID</th>
      <th style="border:1px solid black;background-color:#DDD">Narration</th>
      <th style="border:1px solid black;background-color:#DDD">Debit</th>
      <th style="border:1px solid black;background-color:#DDD">Credit</th>
      <th style="border:1px solid black;background-color:#DDD">Balance</th>
     </tr>
   <?php
     if($row>0)
      {  while($row=$result2->fetch_assoc())
          { ?>
             <tr> 
              <td style="border:1px solid black"><?php echo $row['date']; ?></td>
              <td style="border:1px solid black"><?php echo $row['id']; ?></td>
              <td style="border:1px solid black"><?php echo $row['type']; ?></td>
              <td style="border:1px solid black"><?php echo $row['debit']; ?></td>
              <td style="border:1px solid black"><?php echo $row['credit']; ?></td>
              <td style="border:1px solid black"><?php echo $row['balance']; ?></td>
             </tr>
            <?php
          }
      }
   ?>
   </table>
   <br>
  </th>
 </tr>
</table>
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