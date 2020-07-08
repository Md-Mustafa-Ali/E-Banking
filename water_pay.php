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
  background-color:#DDD;
}
.content 
{ background-color:#0f315c;
  width:92%;
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
{ width:933px;
  background:#000033;
  height:438px;
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
  function gen()
     { $r='';
       for($i=0;$i<3;$i++)
          {   $r=$r.chr(rand(65,90));    }
       for($i=0;$i<7;$i++)
          {   $r=$r.rand(0,9);           }
       return $r;
     }
?>
</head>
</table>
<div class="sbi_tab">
<img style="margin-left:440" src="sbi-logo.png" height="50" width="55" align="left">
<b><font size=40 color=white>State Bank of India</font></b>
<font size=5 color=white><center>e-banking</center></font>
</div>
<img  src="sbi-o.png" height="40" width="120" align="left" style="margin-top:14px">
<font size="7" color= face="Calibri" style="padding-top:100px;margin-left:330px">Pay Your Bills Online</font> 
<img  src="Aadhar.png" height="57" width="100" align="right" style="margin-top:14px"><br>
<b><i><font size=4 color=#6BB1F0 face="Calibri" style="margin-left:50px">ONLINE</font></i></b>
<div class="sbi_tab" style="padding:10px;height:22px;width:180px;background:#CFE8FE" align="left"><font face="Calibri" size=4 color=#034886>Bill Payments</font></div>
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
  <th width="34%" style="margin-left:0px;padding-top:50px">
   <div style="background:#191970;margin-top:-49px;height:400px;width:405px;padding-top:45px;padding-left:45px">
   <div style="background:white;height:355px;width:355px;opacity:0.6;text-align:left"><br><br>
   <form method="post"><br><br>
     <font style="padding-left:0px;padding-left:30px;padding-right:0px">Connection No*</font>
     <input type="text" name="ac" placeholder="Connection Number" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:20px"><br><br>
     <font style="padding-left:0px;padding-left:30px;padding-right:46px">Amount*</font>
     <input type="text" name="am" placeholder="Amount" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:20px"><br><br>
     <?php
       if(isset($_POST['pay']))
          { if(empty($_POST['ac']) || empty($_POST['am']))
               echo '<script>alert("All fields required")</script>';
            else
              { if(is_numeric($_POST['ac']) || is_numeric($_POST['am']))
                 { $id=$_SESSION['ac_no'];
                   $conn=new mysqli("localhost","root","","core_banking");
                   $con=new mysqli("localhost","root","","sbi");
                   if($conn->connect_error || $con->connect_error)
                      die("Connection failed:".$conn->connect_error);
                   $query="SELECT * FROM cb_dtb WHERE account_no='".$id."'";
                   $result=mysqli_fetch_assoc(mysqli_query($conn,$query));
                   if($result['balance']<$_POST['am'])
                       echo '<script>alert("Insufficient Balance")</script>';
                   $bal=$result['balance']-$_POST['am'];
                   mysqli_query($conn,"UPDATE cb_dtb SET balance='".$bal."' WHERE account_no='".$id."'");
                   mysqli_query($con,"INSERT INTO tran_".$id."_t (id,type,debit,credit,balance) VALUES('".$id1=gen()."','water bill payment','".$_POST['am']."',null,'".$bal."')");
                   $_SESSION['payid']=substr($id1,0,10);
                   header("location:pay_success.php");
                 }
                else
                  echo '<script>alert("Enter valid customer ID and Amount")</script>';  
              }
          }
     ?>
     <br>
     <button class="button1" type="submit" name="pay" style="margin-left:50px;background:blue;border:none;height:35px;width:110;color:white">Pay</button>
     <button class="button1" type="reset" name="reset" style="margin-left:30px;background:blue;border:none;height:35px;width:110;color:white">Reset</button>
   </form>
   </div>
   </div>
  </th>
  <th width="66%" style="text-align:left;vertical-align:top">
  <img src="water.jpg" height="445" width="874">
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