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
  function validate($value,$num)
      { if(is_numeric($value) && $num==strlen($value))
           return true;
        else
           return false;
      }
  function gen()
     { $r='';
       for($i=0;$i<3;$i++)
          {   $r=$r.chr(rand(65,90));    }
       for($i=0;$i<7;$i++)
          {   $r=$r.rand(0,9);           }
       return $r;
     }
  $id=$_SESSION['ac_no'];
  $conn=new mysqli("localhost","root","","core_banking");
  if($conn->connect_error)
      die("Connection failed:".$conn->connect_error);
  $query="SELECT * FROM cb_dtb WHERE account_no='".$id."'";
  $result=mysqli_fetch_assoc(mysqli_query($conn,$query));
  if(isset($_POST['submit']))
   { if(empty($_POST['bank']) || empty($_POST['acc']) || empty($_POST['ca']) || empty($_POST['ifsc']) || empty($_POST['amount']))
       echo '<script>alert("All fields are required")</script>';
     elseif($_POST['bank']=="sbi" && validate($_POST['acc'],11)==false)
       echo '<script>alert("Enter valid account number")</script>';
     elseif($_POST['bank']=="hdfc" && validate($_POST['acc'],14)==false)
       echo '<script>alert("Enter valid account number")</script>';
     elseif($_POST['bank']=="CB" && validate($_POST['acc'],10)==false)
       echo '<script>alert("Enter valid account number")</script>';
     elseif($_POST['bank']=="pnb" && validate($_POST['acc'],16)==false)
       echo '<script>alert("Enter valid account number")</script>';
     elseif($_POST['bank']=="icici" && validate($_POST['acc'],12)==false)
       echo '<script>alert("Enter valid account number")</script>';
     elseif($_POST['bank']=="BB" && validate($_POST['acc'],14)==false)
       echo '<script>alert("Enter valid account number")</script>';
     elseif($_POST['bank']=="UB" && validate($_POST['acc'],15)==false)
       echo '<script>alert("Enter valid account number")</script>';
     else
       { if($_POST['ca']!=$_POST['acc'])
           echo '<script>alert("Account number did not match")</script>';
         else
           { if($_POST['amount']>$result['balance'])
                echo '<script>alert("Insufficient Balance")</script>';
             elseif($_POST['bank']=="sbi")
              {  $qr="SELECT * FROM cb_dtb WHERE account_no='".$_POST['acc']."'";
                 $res=mysqli_fetch_assoc(mysqli_query($conn,$qr));
                 $con=new mysqli("localhost","root","","sbi");
                 $debit=$result['balance']-$_POST['amount'];
                 $credit=$res['balance']+$_POST['amount'];
                 mysqli_query($conn,"UPDATE cb_dtb SET balance='".$debit."' WHERE account_no='".$id."'");
                 mysqli_query($conn,"UPDATE cb_dtb SET balance='".$credit."' WHERE account_no='".$_POST['acc']."'");
                 if(mysqli_query($con,"SELECT * FROM tran_".$id."_t")==false)
                     mysqli_query($con,"CREATE TABLE tran_".$id."_t LIKE tran_12345678933_t");
                 mysqli_query($con,"INSERT INTO tran_".$id."_t (id,type,debit,credit,balance) VALUES('".$id1=gen()."','fund transfer','".$_POST['amount']."',null,'".$debit."')"); 
                 if(mysqli_query($con,"SELECT * FROM tran_".$_POST['acc']."_t")==false)
                     mysqli_query($con,"CREATE TABLE tran_".$_POST['acc']."_t LIKE tran_".$id."_t");
                 mysqli_query($con,"INSERT INTO tran_".$_POST['acc']."_t (id,type,debit,credit,balance) VALUES('".$id2=gen()."','fund transfer',null,'".$_POST['amount']."','".$credit."')");
                 $_SESSION['sid']=substr($id1,0,10);
                 $_SESSION['tid']=substr($id2,0,10);
                 $_SESSION['bank']=$_POST['bank'];
                 $_SESSION['trg']=$_POST['acc'];
                 header("location:success.php"); 
              }
             elseif($_POST['bank']!="sbi")
              {  if(mysqli_query($conn,"SELECT * FROM tran_".$id."_t")==false)
                     mysqli_query($conn,"CREATE TABLE tran_".$id."_t LIKE tran_12345678933_t");
                 mysqli_query($con,"INSERT INTO tran_".$id."_t (id,type,debit,credit,balance) VALUES('".$id1=gen()."','fund transfer','".$_POST['amount']."',null,'".$debit."')");
                 $_SESSION['sid']=$id1;
                 $_SESSION['tid']=gen();
                 $_SESSION['bank']=$_POST['bank'];
                 $_SESSION['trg']=$_POST['acc'];
                 header("location:success.php"); 
              }
             else
              { echo '<script>alert("account does not exist")</script>';
              }
           }
       }
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
<font size="7" color= face="Calibri" style="padding-top:100px;margin-left:400px">Fund Transfers</font> 
<img  src="Aadhar.png" height="57" width="100" align="right" style="margin-top:14px"><br>
<b><i><font size=4 color=#6BB1F0 face="Calibri" style="margin-left:50px">ONLINE</font></i></b>
<div class="sbi_tab" style="padding:10px;height:22px;width:180px;background:#CFE8FE" align="left"><font face="Calibri" size=4 color=#034886>Fund Transfers</font></div>
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
     <div class="details" style="padding-left:30px;margin-top:0px"><br><font style="color:blue">          
     <div id="myDropdown" class="content" style="width:855px;height:382px;margin-top:10px;padding-left:50px"><br>
     <font color=red face="Calibri">ALL fields are required</font><br><br>
        <form action="TF.php" method="post"><font face="Californian FB" color="white">
     <font style="color:white;padding-left:0px;padding-right:22px">Target Account*</font>
     <input type="text" name="acc" placeholder="Target Account" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:20px" maxlength="16">
     <br><br>
     <font style="color:white;padding-left:0px;padding-right:10px">Confirm Account*</font>
     <input type="password" name="ca" placeholder="Target Account" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:20px" maxlength="16">
     <br><br>
     <font style="color:white;padding-left:0px;padding-right:51px">Bank Name*</font>
     <select name="bank" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:15px">
         <option value="" selectsed="selected">--Select Bank--</option>
         <option value="sbi">State Bank of India</option>
         <option value="hdfc">HDFC Bank</option>
         <option value="CB">Central Bank of India</option>
         <option value="pnb">Punjab National Bank</option>
         <option value="icici">ICICI Bank</option>
         <option value="BB">Bank of Baroda</option>
         <option value="UB">Union Bank of India</option>
     </select>
     <br><br>
     <font style="color:white;padding-left:0px;padding-right:55px">IFSC Code*</font>
     <input type="text" name="ifsc" placeholder="IFSC Code" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:20px" maxlength="11">
     <br><br>
     <font style="color:white;padding-left:0px;padding-right:73px">Amount*</font>
     <input type="text" name="amount" placeholder="Amount" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:20px" maxlength="10">
     <br><br>
     <button class="button1" type="submit" name="submit" style="margin-left:24px;background:blue;border:none;height:35px;width:110;color:white">Submit</button>
     <button class="button1" type="reset" name="reset" style="margin-left:30px;background:blue;border:none;height:35px;width:110;color:white">Reset</button>
    </form>
   </div></div>
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