<?
header('Content-Type: text/html; charset=utf-8' );

$id=$_GET['id'];

require_once('Connections/cnn.php');
mysql_set_charset('utf8');
mysql_select_db($database_asconn,$asconn);
 
$sql2 ="SELECT * FROM requests where ReqID='$id'";
	echo $sql;		
	$sql_result2 = mysql_query($sql2,$asconn) or die("Couldn't execute query.");
	 
  $row2= mysql_fetch_assoc($sql_result2);

	

if ($id==""){
$id=$_POST["TempId"];	
}

$x=5;

if(isset($_POST["approve"])){
	

	
require_once('Connections/cnn.php');	 		 
mysql_select_db($database_asconn,$asconn);
  
$sql ="update  requests set Approved='Yes' where ReqID='$id' ";
	//echo $sql;		
	$sql_result = mysql_query($sql,$asconn) or die("Couldn't execute query.");


}
	

if(isset($_POST["reject"])){
	
require_once('Connections/cnn.php');	 		 
mysql_select_db($database_asconn,$asconn);
  
$sql ="update  requests set Approved='No' where ReqID='$id' ";
	//echo $sql;		
	$sql_result = mysql_query($sql,$asconn) or die("Couldn't execute query.");


	
}
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<title>تصريح دخول الزوار</title>
<style type="text/css">

	.pure-table { 
      /* Remove spacing between table cells (from Normalize.css) */ 
      border-collapse: collapse; 
      border-spacing: 0; 
      empty-cells: show; 
      border: 1px solid #cbcbcb; 
  } 
  
 
  .pure-table caption { 
      color: #000; 
      font: italic 85%/1 arial, sans-serif; 
      padding: 1em 0; 
      text-align: center; 
  } 
  
 
  .pure-table td, 
  .pure-table th { 
      border-left: 1px solid #cbcbcb;/*  inner column border */ 
      border-width: 0 0 0 1px; 
      font-size: inherit; 
      margin: 0; 
      overflow: visible; /*to make ths where the title is really long work*/ 
      padding: 0.5em 1em; /* cell padding */ 
  } 
  
 
  /* Consider removing this next declaration block, as it causes problems when 
  there's a rowspan on the first cell. Case added to the tests. issue#432 */ 
  .pure-table td:first-child, 
  .pure-table th:first-child { 
      border-left-width: 0; 
  } 
  
 
  .pure-table thead { 
      background-color: #e0e0e0; 
      color: #000; 
      text-align: left; 
      vertical-align: bottom; 
  } 
  
 
  /* 
  striping: 
     even - #fff (white) 
     odd  - #f2f2f2 (light gray) 
  */ 
  .pure-table td { 
      background-color: transparent; 
  } 
  .pure-table-odd td { 
      background-color: #f2f2f2; 
  } 
  
 
  /* nth-child selector for modern browsers */ 
  .pure-table-striped tr:nth-child(2n-1) td { 
      background-color: #f2f2f2; 
  } 
  
 
  /* BORDERED TABLES */ 
  .pure-table-bordered td { 
      border-bottom: 1px solid #cbcbcb; 
  } 
 .pure-table-bordered tbody > tr:last-child > td { 
     border-bottom-width: 0; 
  } 
 
 
 
 
  /* HORIZONTAL BORDERED TABLES */ 
  
 
  .pure-table-horizontal td, 
  .pure-table-horizontal th { 
      border-width: 0 0 1px 0; 
      border-bottom: 1px solid #cbcbcb; 
  } 
  .pure-table-horizontal tbody > tr:last-child > td { 
      border-bottom-width: 0; 
  } 

	
	
	
	
	
	
	
	
	
</style>
</head>

<body><form action="approve.php" method="post">
<input type="hidden"  name="TempId" value ="<? echo $id ?>" />
	
	<table width="60%" border="1" bordercolor="#EFE0E0" align="center" class="pure-table pure-table-horizontal">
		    <tr > 

    <td colspan="2" align="center"><div align="center"><h4><font color=#0C8F37> <?  if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	echo "تمت العملية بنجاح ";
	$Submitted=1;
}?></h4></fon></div></td>
    </tr>  <p>
    <? if($Submitted<>1) {  ?><tr bgcolor=""><thead>
      <td colspan="2" align="center" bgcolor="#CDCACA"><strong>طلب تصريح دخول </strong></td>
      </tr>
    <tr></thead>
    <td colspan="2" align="right"><div align="right">     
      <?
		
		$id=$row2['ReqID'];
	require_once('Connections/cnn.php');	 		 
mysql_select_db($database_asconn,$asconn);
  
$sql3 ="select * from   visitors  where RequestID='$id' ";
	//echo $sql;		
	$sql_result3 = mysql_query($sql3,$asconn) or die("Couldn't execute query.");
	 $row3= mysql_fetch_assoc($sql_result3);
		
		?>
      
      اسماء الزوار</td>
    </tr><? if ($row3['VisitorName1']<>""){  ?>
    <tr align="right">
      <td width="72%" height="33" align="right"><? echo  $row3['VisitorName1'];	  ?></td>
      <td width="28%"  align="right">اسم الزائر الأول </td>
      </tr><? } ?>
   <? if ($row3['VisitorName2']<>""){  ?> <tr>
      <td height="38" align="right"><? echo  $row3['VisitorName2'];	  ?></td>
      <td align="right">االثاني</td>
    </tr><? }  ?>
    <? if ($row3['VisitorName3']<>""){  ?><tr>
      <td align="right"><? echo  $row3['VisitorName3'];	  ?></td>
      <td align="right">الثالث</td>
    </tr><?   } ?>
    
  
   <tr>
     <td align="right"><? echo  $row2['GroupName'];	  ?></td>
     <td align="right">اسم المجموعة </td>
   </tr> <? if ($row2['GroupNameList']<>"http://dah/vt/"){  ?> 
   <tr>
      <td colspan="2" align="right"><a href="<? echo  $row2['GroupNameList'];	  ?>">لمشاهدة اسماء المجموعة اضغط هنا</a><br/></td>
      </tr><?  } ?>
    
    <tr>
      <td height="37" align="right"><? echo  $row2['visitorNum'];	  ?></td>
      <td align="right">رقم تواصل للزائر</td>
    </tr>
    <tr>
      <td height="29" align="right">
        
  <div class=""></div><? echo  $row2['ArrivalDate'];	  ?>
        
        
  <br>
  <br>
  <div id="zh_cal_div"></div></td>
      <td align="right" >تاريخ الزيارة</td>
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
      <td height="34"align="right" axis=""><? echo  $row2['ArrivalTime'];	  ?></td>
      <td align="right">وقت الوصول </td>
    </tr><tr>
      <td height="38" align="right"><? echo  $row2['ExitTime'];	  ?></td><div id="diff_output"></div>
      <td align="right">وقت الخروج المتوقع </td>
    </tr>
    <tr>
      <td height="33" align="right"><? echo  $row2['DepName'];	  ?></td>
      <td align="right">زيارة لقسم </td>
    </tr>
    <tr>
      <td height="33" align="right"><? echo  $row2['Location'];	  ?></td>
      <td align="right">الموقع </td>
    </tr>
    <tr>
      <td height="33" align="right"><? echo  $row2['GateNum'];	  ?></td>
      <td align="right">بوابة الدخول</td>
    </tr>
    <tr>
      <td height="32" align="right"><? echo  $row2['RequesterPhone'];	  ?>
      <td align="right">رقم للتواصل عند وصول الزائر</td>
    </tr>
    
    <tr>
      <td height="38" align="right"><? echo  $row2['VisitReson'];	  ?></td>
      <td align="right">سبب الزيارة </td>
    </tr>
    <tr>
    <td height="50" align="right"><? echo  $row2['Notes'];	  ?></td>
    <td align="right">ملاحظات</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="approve" id="button" value="Confirmed" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="submit" name="reject" id="button2" value="Not Confirmed" />
    </div></td>
    </tr><?  }  ?>
</table>
	
	
	
	
	
	</form>

</body>
</html>