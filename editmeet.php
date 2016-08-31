<?php
session_start();
if(!isset($_SESSION['Admin']))
{
	header('Location: index.html');
	die();
}
?>
<?php
 $_GET['idautodatastart'];


?>

<?php
include 'config.php';
connect_db();
$query = db()->query('SELECT idautodatastart, round, date, time, place, statusmeeting FROM tbldatastart');
list($idautodatastart, $round, $date, $time, $place, $statusmeeting) = $query->fetch_row()

?>


<!doctype html>
<html lang="en">
<title>แบบตอบรับการเข้าประชุมออนไลน์</title>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="style.css" rel="stylesheet" type="text/css">
 </head>
 <body>
 <div class="container">
	<div class="row">
	<form class="form-horizontal" action="editmeet2.php" method="post">

	<div class="form-group">
		<div class="col-sm-5"></div>
		

	<div class="form-group">
		<div class="col-sm-0"></div>
		<div class="bg-primary">แก้ไขข้อมูล</div>
		<div class="col-sm-6">
		</div>
	</div>
   
   </FONT>
		<div class="col-sm-6">
		</div>
	</div>
   
	<div class="form-group" >
	<label  class="col-sm-4 control-label" >ครั้งที่ : </label>
	<div class="col-sm-4">
	<input type="number" name="round" class="form-control" value="<?php echo $round?>">
	 </div>
	 </div>

	<div class="form-group">
		<label class="col-sm-4 control-label" >วันที่ : </label>
		<div class="col-sm-4">
			<input type="text" name="date" class="form-control" value="<?php echo $date?>">
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-2"></div>
	</div>
	  
	<div class="form-group">
		<label class="col-sm-4 control-label" >เวลา : </label>
			<div class="col-sm-4">
		<input type="time" name="time" class="form-control" value="<?php echo $time?>">
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-2"></div>
	</div>
	
	<div class="form-group">
	<label class="col-sm-4 control-label" >สถานที่ : </label>
	<div class="col-sm-4">
		<input type="text" name="place" class="form-control" value="<?php echo $place?>">
	 </div>
	 </div>

	 <div class="form-group">
		<div class="col-sm-2"></div>
	</div>

	<div class="form-group" >
	<label  class="col-sm-4 control-label" >สถานะ : </label>
	<div class="col-sm-4">
		<select class="form-control" id="statusmeeting" name="statusmeeting">
			<?php 
					
				$query = db()->query('SELECT mtname, mtstatus FROM setmeeting');
				echo db()->error;
				while ($data = $query->fetch_array())
				{
				?>
					<option value="<?php echo $data['mtstatus'];?>"><?php echo $data['mtname'];?></option>
				<?php
				}
				?>
		</select>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-5"></div>
	<div class="col-sm-7">
	<input type="hidden" name="idautodatastart" value="<?php echo $_GET['idautodatastart'];?>">
	<input a class="btn btn-primary btn-lg" type="submit" value="แก้ไข"></a></div>       
	
	<ul class="pager">
    <li class="previous" type="button" value="Refresh"><a href="setmeet.php">ย้อนกลับ</a></li>
	</ul>
</div>


  </form>
  </div>
</div>

  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
 </body>
</html>