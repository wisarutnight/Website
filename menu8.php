<?php
session_start();
if(!isset($_SESSION['status']))
{
	header('Location: index.html');
	die();
}
?>
<?php
include 'config.php';
connect_db();

$query = db()->query('SELECT no, userId, username, password, status, first, name, sername, position, tel, telephone, statusnow, category, datein, dateout FROM users');
list($no, $userId, $username, $password, $status, $first, $name, $sername, $position, $tel, $telephone, $statusnow, $category, $datein, $dateout) = $query->fetch_row();


?>
<!doctype html>
<html lang="en"
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
 <div class="container">
	<div class="row">
	<form class="form-horizontal" action="put.php" method="post">

	<div class="form-group">
		<div class="col-sm-5"></div>
		

	<div class="form-group">
		<div class="col-sm-0"></div>
		<div class="bg-primary">ข้อมูลทั่วไป</div>
		<div class="col-sm-6">
		</div>
	</div>
   
   </FONT>
		<div class="col-sm-6">
		</div>
	</div>
   
	<div class="form-group" >
	<label  class="col-sm-4 control-label" >ลำดับ : </label>
	<div class="col-sm-4">
	<input type="text" name="no" class="form-control">
	 </div>
	 </div>

	<div class="form-group">
		<label class="col-sm-4 control-label" >คำนำหน้า : </label>
		<div class="col-sm-4">
			<input type="text" name="first" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-2"></div>
	</div>
	  
	<div class="form-group">
		<label class="col-sm-4 control-label" >ชื่อ : </label>
			<div class="col-sm-4">
		<input type="text" name="name" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-2"></div>
	</div>
	
	<div class="form-group">
	<label class="col-sm-4 control-label" >นามสกุล : </label>
	<div class="col-sm-4">
		<input type="text" name="sername" class="form-control">
	 </div>
	 </div>

	 <div class="form-group">
		<div class="col-sm-2"></div>
	</div>

	<div class="form-group" >
	<label  class="col-sm-4 control-label" >ตำแหน่ง : </label>
	<div class="col-sm-4">
	<input type="text" name="position" class="form-control">
	 </div>
	 </div>

	 <div class="form-group">
		<div class="col-sm-2"></div>
	</div>

	<div class="form-group" >
	<label  class="col-sm-4 control-label" >เบอร์โทรศัพท์ : </label>
	<div class="col-sm-4">
	<input type="text" name="telephone" class="form-control">
	 </div>
	 </div>

	<div class="form-group" >
	<label  class="col-sm-4 control-label" >เลขติดต่อ : </label>
	<div class="col-sm-4">
	<input type="text" name="tel" class="form-control">
	 </div>
	 </div>

		<div class="form-group" >
	<label  class="col-sm-4 control-label" >วันที่เข้ารับตำแหน่ง : </label>
	<div class="col-sm-4">
	<input type="date" name="datein" class="form-control">
	 </div>
	 </div>

	<div class="form-group">
		<label class="col-sm-4 control-label" >วันที่หมดวาระ : </label>
		<div class="col-sm-4">
			<input type="date" name="dateout" class="form-control">
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-5"></div>
		<div class="bg-primary">ข้อมูลเกี่ยวกับระบบ</div>
		<div class="col-sm-6">
		</div>
	</div>



	<div class="form-group" >
	<label  class="col-sm-4 control-label" >สถานะผู้ใช้ : </label>
	<div class="col-sm-4">
	
<select class="form-control" id="status" name="status">
<?php 
	
$query = db()->query('SELECT numberst, namestatus FROM stlog');
echo db()->error;
while ($data = $query->fetch_array())
{
?>
    <option value="<?php echo $data['numberst'];?>"><?php echo $data['namestatus'];?></option>
<?php
}
?>
</select>
	 </div>
	 </div>

	<div class="form-group" >
	<label  class="col-sm-4 control-label" >Username : </label>
	<div class="col-sm-4">
	<input type="text" name="username" class="form-control">
	 </div>
	 </div>

	<div class="form-group" >
	<label  class="col-sm-4 control-label" >Password : </label>
	<div class="col-sm-4">
	<input type="text" name="password" class="form-control">
	 </div>
	 </div>

	<div class="form-group" >
	<label  class="col-sm-4 control-label" >สถานะกรรมการ : </label>
	<div class="col-sm-4">
<select class="form-control" id="category" name="category">
<?php 
	
$query = db()->query('SELECT catenumber, catename FROM catelog');
echo db()->error;
while ($data = $query->fetch_array())
{
?>
    <option value="<?php echo $data['catenumber'];?>"><?php echo $data['catename'];?></option>
<?php
}
?>
</select>
	 </div>
	 </div>

	<div class="form-group" >
	<label  class="col-sm-4 control-label" >สถานะกรรมการปัจจุบัน : </label>
	<div class="col-sm-4">
<select class="form-control" id="statusnow" name="statusnow">
<?php 
	
$query = db()->query('SELECT numberstnow, namestnow FROM stnowlog');
echo db()->error;
while ($data = $query->fetch_array())
{
?>
    <option value="<?php echo $data['numberstnow'];?>"><?php echo $data['namestnow'];?></option>
<?php
}
?>
</select>
	 </div>
	 </div>

	<div class="form-group">
		<div class="col-sm-2"></div>
	</div>

<div class="form-group">
	<div class="col-sm-5"></div>
	<div class="col-sm-7">
	<input type="hidden" name="put">
	<input a class="btn btn-primary btn-lg" type="submit" value="เพิ่ม"></a></div>       
	
	<ul class="pager">
    <li class="previous" type="button" value="Refresh"><a href="menu6.php">ย้อนกลับ</a></li>
	</ul>
</div>

  </form>
  </div>
</div>
  

  </form>
  </div>
</div>

  
<a style="display:scroll;position:fixed;bottom:5px;right:5px;" class="backtotop" href="#" rel="nofollow" title="Back to Top"><img style="border:0;" src="top.png"/></a>
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
 </body>
</html>