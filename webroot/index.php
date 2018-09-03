
<?
header('Content-Type: text/html; charset=utf-8' );

////////////////////////




session_start();

$inactive = 3600;
if( !isset($_SESSION['timeout']) )
$_SESSION['timeout'] = time() + $inactive; 

$session_life = time() - $_SESSION['timeout'];

if($session_life > $inactive)
{  session_destroy(); header("Location:http://dah/sso/login.php");     }

$_SESSION['timeout']=time();


if($_SESSION['user_name']=="" ){
	
//header("Location:http://dah/sso/login.php");	
	
	
}
$reqesterName2 = $_POST['reqesterName'];
$reqesterEmail2 = $_POST['reqesterEmail'];

if($reqesterName2=="" && $reqesterEmail2==""){
$reqesterName=$_GET['id1'];
$reqesterEmail=$_GET['id4'];
	
//echo $reqesterName;
	//echo $reqesterEmail;
}
//echo $reqesterName2;
	//echo $reqesterEmail2;







$ReqDate="0000-00-00";

$name1 = $_POST['name1'];
$name2 = $_POST['name2'];
$name3 = $_POST['name3'];

$visitorNum = $_POST['visitorNum'];
$ArrivalDate = $_POST['ArrivalDate'];
$time = $_POST['time'];
$depName = $_POST['depName'];
$location = $_POST['location'];
$gate = $_POST['gate'];
$exittime = $_POST['exittime'];
$requesterNum = $_POST['requesterNum'];
$reason = $_POST['reason'];
$note = $_POST['note'];
$gate = $_POST['gate'];
$groupName = $_POST['groupName'];
$requesterNum=$_POST['requesterNum'];
//////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['button'])){
	
if(isset($_FILES['file'])){
      $errors= array();
      $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
    
      $expensions= array("jpeg","jpg","png","pdf","docx","xlsx");
      
	if ($_FILES['file']['name']<>""){
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG or XLSX or DOCX or Doc or PDF file.";
      }}
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"upload/".$file_name);
        $file="upload/".$file_name;
		  //echo "Success";
      }else{
         print_r($errors);
      }
   }

/////////////////////////////////////////////////////////////////////////////////
$file="http://dah/vt/".$file;
require_once('Connections/cnn.php');	 		 
mysql_select_db($database_asconn,$asconn);
	mysql_query("SET NAMES 'utf8'");
mysql_query('SET CHARACTER SET utf8');

$insertSQL = "INSERT into  requests (ArrivalTime,GroupNameList,visitorNum,GroupName,RequesterPhone,DepName,Location,ExitTime,VisitReson,Notes,ReqDate,GateNum,ArrivalDate,RequesterEmail,RequesterName) values ('$time','$file','$visitorNum','$groupName','$requesterNum','$depName','$location','$exittime','$reason','$note','$ReqDate','$gate','$ArrivalDate','$reqesterEmail2','$reqesterName2')";
$Result1 = mysql_query($insertSQL, $asconn) or die(mysql_error());
	$last_id = mysql_insert_id();
//echo $last_id;

require_once('Connections/cnn.php');	 		 
mysql_select_db($database_asconn,$asconn);

$insertSQL = "INSERT into  visitors (VisitorName1,VisitorName2,VisitorName3,RequestID) values ('$name1','$name2','$name3','$last_id')";

$Result1 = mysql_query($insertSQL, $asconn) or die(mysql_error());

//////////////////////Sending Email//////////////

$to = 'yosaime'.'@dah.edu.sa';/// PSSD Email
 $subject = 'DAH Visitors System';
 $message = 'Dear '.$x.' ,'."\r\n" .'
<p>
 <span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;
color:black">Approval request </span></p>
<span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;
color:#1F497D">

<a href="http://visitors/approve.php?id='."$last_id" .'"> for more detail click here </a>





This e-mail was sent from a notification-only address that cannot 
accept incoming e-mail. <b>Please do not reply to this email</b>.</span>
'
;
 $headers = 'From: IT Department' . "\r\n" ;
 
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
mail($to, $subject, $message, $headers);



//////////////////End Email //////////////////////////////		
	
	
	

}

?>

<!DOCTYPE HTML>
<html>

<head>
  <title>طلب تصريح دخول زائر</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
	
	
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="stylesheet" type="text/css" href="normalize.css">
<link rel="stylesheet" type="text/css" href="enStyle.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

	
	
	
	
	
	
<!-- DATE __></-->
	
	
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" type="text/css" media="all">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
	
<script>
$(function(){
        $("#to").datepicker({ dateFormat: 'yy-mm-dd' });
        $("#from").datepicker({ dateFormat: 'yy-mm-dd' }).bind("change",function(){
            var minValue = $(this).val();
            minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
            minValue.setDate(minValue.getDate()+1);
            $("#to").datepicker( "option", "minDate", minValue );
        })
    });

</script>	
	
	<style> 
input[type=text] {
    width: 80%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 3px solid #ccc;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
	 background-color: ;
    color: gray;
}
input[type=number] {
    width: 80%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 3px solid #ccc;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
	 background-color: ;
    color: gray;
}
input[type=text]:focus {
    border: 3px solid #555;
}
		
textarea {
    width: 80%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    resize: none;
 }		
		
</style>
	
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo" align="right"><img src="img/header.png" width="400" height="129" alt=""/></div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="index.html">الرئيسية</a></li>
          <li ><a href="#">الأدمن</a></li>
          <li><a href="logout.php">تسجيل خروج</a></li>
         
         
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div  align="center">
        <p>
        <!-- insert the page content here --></p>
        <font  face="Arial Unicode MS" size="5"> طلب تصريح دخول زوار</font>
        </p>
        
        <form action="index.php" method="post" enctype="multipart/form-data" id="form_id">
		  <table width="70%" border="0"  align="right">
		    <tr align="center">
    <td colspan="2" align="center"><font size="5" face="Arial Unicode MS" ><div align= "center"><font color=#0C8F37>
      <?  if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	echo " تم ارسال طلبك";
	
}?>
    
		</fon></div></font></td>
    </tr><p>
    
   
    <tr>
      <td width="67%" height="33" align="right" class="b">
		  <input type="hidden" name="reqesterName" value="<?  echo $reqesterName; ?>">
		  
		  <input type="hidden" name="reqesterEmail" value="<?  echo  $reqesterEmail; ?>">
		  
		  <input type="text" name="name1"  width="250" ></td>
		<td width="33%" colspan="-1" align="right"><font size="2" face="Arial Unicode MS" >اسم الزائر الأول</font></td>
      </tr>
    <tr>
      <td height="38" class="b" align="right"><input type="text" name="name2" id="textfield"></td>
		<td colspan="-1" align="right"><font size="2" face="Arial Unicode MS">اسم الزائر الثاني</font></td>
    </tr> 
    <tr>
      <td class="b" align="right"><input type="text" name="name3" id="textfield3"></td>
      <td colspan="-1" align="right"><font size="2" face="Arial Unicode MS" >اسم الزائر الثالث</font></td>
    </tr>
    <tr bgcolor="#F3E4D7">
      <td colspan="2" class="b" align="right"><font size="2" face="Arial Unicode MS" >اذا كان عدد الزوار اكثر من ثلاث أشخاص الرجاء ارفاق ملف يحتوي على اسماءهم مع ذكر اسم المجموعة 
		  
		  </font>
		  
		  </td>
      </tr>
    <tr>
      <td class="b" align="right"><input type="text" name="groupName" id="textfield4"></td>
		<td colspan="-1" align="right"><font size="2" face="Arial Unicode MS" >اسم المجموعة</font>
		  
		 
		   </td>
    </tr>
    <tr align="right">
      <td colspan="2" class="b"> &quot;jpeg&quot;,&quot;jpg&quot;,&quot;png&quot;,&quot;pdf&quot;,&quot;docx&quot;,&quot;xlsx&quot;.file
        <input type="file" name="file" /><font size="2" face="Arial Unicode MS" >ارفاق ملف</font><br/><font color="#FF0E12"></font></td>
      </tr>
    <tr bgcolor="#F3E4D7">
      <td height="15" colspan="2" class="b"></td>
      </tr>
    <tr>
      <td height="37" class="b" align="right">*
<input type="number" name="visitorNum" id="textfield2"  required></td>
      <td colspan="-1" align="right"><font size="2" face="Arial Unicode MS" >رقم تواصل للزائر</font></td>
    </tr>
    <tr>
      <td height="29" class="b" align="right">
        
  <div class=""> 
    *
    <input type="text" id="from" name="ArrivalDate" required>
  </div>
        
        
  <br>
  <br>
  <div id="zh_cal_div"></div></td>
      <td colspan="-1" align="right" ><font size="2" face="Arial Unicode MS" >تاريخ الزيارة</font> </td>
    </tr>
    <tr><script type="text/javascript" src="PATH/TO/ng_all.js"></script>
<script type="text/javascript" src="PATH/TO/ng_ui.js"></script>
<script type="text/javascript" src="PATH/TO/components/timepicker.js"></script>
	
	
<!-- Time __></-->	
	
<script type="text/javascript">
ng.ready( function() {
    ng.ready(function(){
        var tmpkr1 = new ng.TimePicker({
            input: 'diff_time1',
            events: {
                onSelect: calc_diff,
                onUnselect: calc_diff
            }
        });
        var tmpkr2 = new ng.TimePicker({
            input: 'diff_time2',
            events: {
                onSelect: calc_diff,
                onUnselect: calc_diff
            }
        });
        
        function calc_diff(){
            // getting the selected time values
            // value is a timestamp of the selected date
            // or null
            var tm1 = tmpkr1.p.value;
            var tm2 = tmpkr2.p.value;
            
            if ((!ng.defined(tm1)) || (!ng.defined(tm2))) {
                ng.get('diff_output').innerHTML = '';
                return;
            }
            
            var dif = Math.abs(tm1 - tm2); // difference in milliseconds
            var seconds = Math.round(dif/1000);
            var minutes = 0, hours = 0;
            if (seconds > 60) {
                minutes = Math.floor(seconds / 60);
                seconds = seconds - (minutes * 60);
            }
            if (minutes > 60){
                hours = Math.floor(minutes / 60);
                minutes = minutes - (hours * 60);    
            }
            
            var output = '';
            if (hours > 0) output = hours +' hours, ';
            if ((hours > 0) || (minutes > 0)) output += minutes+' minutes and ';
            output += seconds + ' seconds';
            
            ng.get('diff_output').innerHTML = output;
        };
    });
});
</script>	
      <td height="34" class="b" align="right">*
        <input type="text" id="diff_time1" value="" name="time" required></td>
      <td colspan="-1" align="right"><font size="2" face="Arial Unicode MS" >وقت الوصول</font>  </td>
    </tr><tr>
      <td height="38" class="b" align="right">*
        <input type="text" id="diff_time2" value="" name="exittime" required></td>
      <div id="diff_output"></div>
      <td colspan="-1" align="right"><font size="2" face="Arial Unicode MS" >وقت الخروج المتوقع</font>   </td>
    </tr>
    <tr>
      <td height="33" class="b" align="right">*<?  
		  
		   $tns = "  
(DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = SISDB.DARALHEKMA.EDU.SA)(PORT = 1521))
    )
    (CONNECT_DATA =
      (SERVICE_NAME = DAH.DARALHEKMA.EDU.SA)
    )
  )
       ";



//=============================================Update SISPassword===========================================================
require "C:\config\connect.php" ;

   //print "Connected to Oracle!";

   $Orcle_Sql="select DPS_A_DESC,DPS_L_DESC
                from DAH_V_DEPT  ";

   $array = oci_parse($conn,$Orcle_Sql);

oci_execute($array);
  $option1_block .= "<OPTION value=\"$all\">$all</OPTION>";
while($row=oci_fetch_array($array))

{       $DPS_CODE=$row[0];
        $DPR_L_DESC=$row[1];
        

//echo   $DPR_L_DESC ."<br>";

$all=$DPS_CODE;
$option1_block .= "<OPTION value=\"$all\">$all</OPTION>";
       

}



		  
		  
		  ?>
        <select name="depName">
                      
												

                   
                        <option value="0">Select the Name:
                          <p>
                        </option>
                        <p>
                        <p>
                        <p>
                        <p>
                        <p>
                        <p>
                        <p>
                        <p>
                        </p>
                        <?php echo "$option1_block"; ?>
                      </select></td>
      <td colspan="-1" align="right"><font size="2" face="Arial Unicode MS" >زيارة لقسم</font> </td>
    </tr>
    <tr>
      <td height="33" class="b" align="right">*
        <input type="text" name="location" id="textfield5" required></td>
      <td colspan="-1" align="right"><font size="2" face="Arial Unicode MS" >الموقع</font>
		  
		   </td>
    </tr>
    <tr>
      <td height="33" class="b" align="right">*
        <select name="gate">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select></td>
      <td colspan="-1" align="right"><font size="2" face="Arial Unicode MS" >بوابة الدخول</font></td>
    </tr>
    <tr>
      <td height="32" class="b" align="right">*
        <input type="number" name="requesterNum" id="textfield5" required></td>
      <td colspan="-1" align="right"><font size="2" face="Arial Unicode MS" >رقم للتواصل عند وصول الزائر</font>  </td>
    </tr>
    
    <tr>
      <td height="38" class="b" align="right">*
        <input type="text" name="reason" id="textfield5" required></td>
      <td colspan="-1" align="right"><font size="2" face="Arial Unicode MS" ><font size="2" face="Arial Unicode MS" >سبب الزيارة</font>  </td>
    </tr>
    <tr>
    <td height="50" class="b" align="right"><textarea name="note" id="textarea2" rows="10" cols="50" ></textarea></td>
    <td colspan="-1" align="right"><font size="2" face="Arial Unicode MS" >ملاحظات</font></td>
  </tr>
  <tr>
    <td colspan="2" class="b"><div align="center">
      <input type="Submit" name="button" id="button" value="ارسال" class="search">
      </div></td>
  </tr>
  </table></form>
      </div>
    </div>
    <div id="footer">
    Copyright &copy;Dar Al Hekma Univirsity </div>
  </div>
</body>
</html>
