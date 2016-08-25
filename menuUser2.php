<?php
session_start();
if(!isset($_SESSION['status']))
{
	header('Location: index.html');
	die();
}
include 'config.php';
connect_db();
?>
<head>
  <meta charset="UTF-8">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  
 </head>
<style type="text/css">

body  { background-color : FFFFCC }

</style>
<link href="style.css" rel="stylesheet">
<center>
<!-- ตรงนี้ส่วนนี้เป็นการกำหนดขนาดความกว้างสามารถนำไปเปลี่ยนแปลงเองได้ -->
<TABLE height=1 cellSpacing=0 cellPadding=0 width="1340" bgColor=#FFFFFF border=0>
<TBODY>
<TR bgColor=FFFFCC>
	<TD onmouseover="mOvr(this,'#6600FF');" onclick=mClk(this); onmouseout=mOut(this); align=center width=120 height=1>
	<h3 align="left">
	<form name="test">
		<input type="text" size="11" name="Clock">
	</form>
	<script>
		<!--
		function show(){
		var Digital=new Date()
		var hours=Digital.getHours()
		var minutes=Digital.getMinutes()
		var seconds=Digital.getSeconds()
		var dn="AM" 
		if (hours>=12)
		dn="PM"
		if (hours>12)
		hours=hours-12
		if (hours==0)
		hours=12
		if (minutes<=9)
		minutes="0"+minutes
		if (seconds<=9)
		seconds="0"+seconds
		document.test.Clock.value=hours+":"+minutes+":"
		+seconds+" "+dn
		setTimeout("show()",1000)
		}
		show()
	</script>

	</h3>
	<TD onmouseover="mOvr(this,'#6600FF');" onclick=mClk(this); onmouseout=mOut(this); align=center width=120 height=1>
	<h3 align="right"><a href="logout.php"><font face="MS Sans Serif" color="000000" size="4">ออกจากระบบ</font></a>
	</h3>
	</TD>
</TR></TBODY></TABLE>
</center>
	
<center>						
	<!-- ตรงนี้ส่วนนี้เป็นการกำหนดขนาดความกว้างสามารถเปลี่ยนแปลงเองได้ -->
	<TABLE height=50 cellSpacing=1 cellPadding=0 width="1200" bgColor=0099FF border=0>
	
	<TBODY>
	<TR bgColor=0099FF>
	<TD bgcolor="white" onmouseover="mOvr(this,'#6600FF');" onclick=mClk(this); onmouseout=mOut(this); align=center width=120 height=1>
	<a href="menuUser2.php"><font face="MS Sans Serif" color="000000" size="4">หน้าหลัก</font></a></TD>
	<TD onmouseover="mOvr(this,'#6600FF');" onclick=mClk(this); onmouseout=mOut(this); align=center width=120 height=1>
	<a href="form2.php"><font face="MS Sans Serif" color="000000" size="4">แบบตอบรับ</font></a></TD>
	<TD onmouseover="mOvr(this,'#6600FF');" onclick=mClk(this); onmouseout=mOut(this); align=center width=120 height=1>
	<a href="myUser2.php"><font face="MS Sans Serif" color="000000" size="4">ข้อมูลส่วนตัว</font></a></TD>
	<TD onmouseover="mOvr(this,'#6600FF');" onclick=mClk(this); onmouseout=mOut(this); align=center width=120 height=1>
	<a href="info2.php"><font face="MS Sans Serif" color="000000" size="4">ติดต่อสอบถาม</font></a></TD>
	<TD onmouseover="mOvr(this,'#6600FF');" onclick=mClk(this); onmouseout=mOut(this); align=center width=120 height=1>	
	<TD onmouseover="mOvr(this,'#6600FF');" onclick=mClk(this); onmouseout=mOut(this); align=center width=120 height=1>
	<TD onmouseover="mOvr(this,'#6600FF');" onclick=mClk(this); onmouseout=mOut(this); align=center width=120 height=1>
	<TD onmouseover="mOvr(this,'#6600FF');" onclick=mClk(this); onmouseout=mOut(this); align=center width=120 height=1>
	<TD onmouseover="mOvr(this,'#6600FF');" onclick=mClk(this); onmouseout=mOut(this); align=center width=120 height=1>
	</TR></TBODY></TABLE>
</center>



	