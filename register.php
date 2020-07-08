<html>
<head>
<title>SBI online</title>
<?php
 ob_start();
 session_start();
?>
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
</head>
<body>
<p id="test"></p>
<div class="sbi_tab">
<img style="margin-left:440" src="sbi-logo.png" height="50" width="55" align="left">
<b><font size=40 color=white>State Bank of India</font></b>
<font size=5 color=white><center>e-banking</center></font>
</div>
<img  src="sbi-o.png" height="40" width="120" align="left" style="margin-top:14px">
<font size="7" color= face="Calibri" style="padding-top:100px;margin-left:200px">User Driven Registration - New User</font> 
<img  src="Aadhar.png" height="57" width="100" align="right" style="margin-top:14px"><br>
<b><i><font size=4 color=#6BB1F0 face="Calibri" style="margin-left:50px">ONLINE</font></i></b>
<div class="sbi_tab" style="padding:10px;height:22px;width:180px;background:#CFE8FE" align="left"><font face="Calibri" size=4 color=#034886>New User Registration</font></div>
<img style="margin-top:-46px;margin-right:1105px" src="arrow.png" height="50" width="60" align="right">
<div class="sbi_tab" style="padding:10px;height:22px;width:1123px;background:#CFE8FE;margin-left:190px;margin-top:-42px"></div><br>
<div class="details" style="padding-left:40px;margin-left:270px;width:65%"><br><font style="color:white">REGISTER</font><br>  
<div class="space" style="outline:none;background-color:#191970;width:94.9%;border:0px;padding-top:9px;text-align:left">
<font style="color:white">&nbsp;&nbsp;PERSONAL&nbsp; DETAILS</font></div><br>         
<div id="myDropdown" class="content" style="padding-left:25px;padding-top:17px;padding-bottom:17px;height:78%">
<font color=red face="Calibri">ALL fields are required</font><br><br>
      <form action="register.php" method="post"><font face="Californian FB" color="white">
<font style="color:white;padding-left:0px;padding-right:10px">Account Number*</font>
<input type="text" name="Account_Number" placeholder="Account Number" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:20px" maxlength="11">
<font color=white face="Calibri" style="font-weight:100;font-size:14px">(Account Number is available in your passbook and/or statement of account)</font>
<br><br>
<font style="color:white;padding-left:0px;padding-right:37px">CIF Number *</font>
<input type="text" name="CIF_Number" placeholder="CIF Number" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:20px" maxlength="11">
<font color=white face="Calibri" style="font-weight:100;font-size:14px">(CIF Number is available in your passbook and/or statement of account)</font>
<br><br>
<font style="color:white;padding-left:0px;padding-right:36px">Branch Code *</font>
<input type="text" name="Branch_Code" placeholder="Branch Code" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:20px" maxlength="5">
<font color=white face="Calibri" style="font-weight:100;font-size:14px">(Please enter 5 digit branch code )</font>
<br><br>
<font style="color:white;padding-left:0px;padding-right:65px">Country *</font>
<select name="Country" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:25px">
    <option value="" selectsed="selected">--Select Country--</option>
    <option value="bangladesh">Bangladesh</option>
    <option value="china">China</option>
    <option value="india">India</option>
    <option value="nepal">Nepal</option>
    <option value="pakistan">Pakistan</option>
    <option value="srilanka">Sri Lanka</option>
    <option value="usa">USA</option>
</select><br><br>
<font style="color:white;padding-left:0px;padding-right:16px">Mobile Number *</font>
<input type="text" name="Mobile_Number" placeholder="Mobile Number" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:13px" maxlength="10">
<font color=white face="Calibri" style="font-weight:100;font-size:14px">(Please enter Mobile Number registered with Bank)</font>
<br><br>
<font style="color:white;padding-left:0px;padding-right:63px">Email ID *</font>
<input type="text" name="Email" placeholder="Email" style="outline:none;width:172;height:35;border:0px;background-color:#2b4769;color:white;padding-left:20px" maxlength="50">
<br><br><br>
<button class="button1" type="submit" name="submit" style="margin-left:24px;background:blue;border:none;height:35px;width:110;color:white">Register</button>
<button class="button1" type="reset" name="reset" style="margin-left:30px;background:blue;border:none;height:35px;width:110;color:white">Reset</button>
</form>
<?php
    function validate($value,$num)
      { if(is_numeric($value) && $num==strlen($value))
           return true;
        else
           return false;
      }
    function val_e($value)
      { if(filter_var($value,FILTER_VALIDATE_EMAIL))
           return true;
        else
           return false;
      }
    if(isset($_POST['submit']))
        { $AN=$_POST['Account_Number'];
          $CN=$_POST['CIF_Number'];
          $BC=$_POST['Branch_Code'];
          $Con=$_POST['Country'];
          $MN=$_POST['Mobile_Number'];
          $EM=$_POST['Email'];
          if(empty($AN) || empty($CN) || empty($BC) || empty($Con) || empty($MN) || empty($EM))
               echo '<script>alert("All fields are required")</script>';  
          else{ if(validate($AN,11)==false)
                   echo '<script>alert("Enter valid account number")</script>';
                elseif(validate($CN,11)==false)
                   echo '<script>alert("Enter valid CIF number")</script>';
                elseif(validate($BC,5)==false)
                   echo '<script>alert("Enter valid branch code")</script>';
                elseif(validate($MN,10)==false)
                   echo '<script>alert("Enter valid mobile number")</script>';
                elseif(val_e($EM)==false)
                   echo '<script>alert("Enter valid Email ID")</script>';
                else
                   {  $conn=new mysqli("localhost","root","","core_banking"); 
                      if ($conn->connect_error)
                        { die("Connection failed:".$conn->connect_error);
                        } 
                      $query="SELECT * FROM cb_dtb WHERE account_no='".$AN."'";
                      $exist=mysqli_num_rows(mysqli_query($conn,$query));
                      $result=mysqli_fetch_assoc(mysqli_query($conn,$query));
                      if($exist==0)
                          echo '<script>alert("Your account not found")</script>';
                      elseif($result['cif_no']!=$CN)
                          echo '<script>alert("Wrong CIF number")</script>';
                      elseif($result['branch_code']!=$BC)
                          echo '<script>alert("Wrong branch code")</script>';
                      elseif($result['mobile_no']!=$MN)
                          echo '<script>alert("Entered mobile number not registerd with bank")</script>';
                      else
                         { $_SESSION['pass']=$_POST['Account_Number'];
                           header("location:createID.php");
                         }
                   }
              }
        }
?>
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