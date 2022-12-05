<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])) {   
header('location:index.php');
}
else{ 

if(isset($_POST['add']))
{
$reportername=$_POST['reportername'];
$idno=$_POST['idno'];
$phoneno=$_POST['phoneno'];
$obnumber=$_POST['obnumber'];
$case=$_POST['case'];
$reporteddate=$_POST['reporteddate'];
$place=$_POST['place'];

{
$sql="INSERT INTO  casestbl(ReporterName,ReporterId,PhoneNumber,ObNumber,ReportedCase,ReportedDate,Place) VALUES(:reportername,:idno,:phoneno,:obnumber,:case,:reporteddate,:place)";
$query = $dbh->prepare($sql);
$query->bindParam(':reportername',$reportername,PDO::PARAM_STR);
$query->bindParam(':idno',$idno,PDO::PARAM_STR);
$query->bindParam(':phoneno',$phoneno,PDO::PARAM_STR);
$query->bindParam(':obnumber',$obnumber,PDO::PARAM_STR);
$query->bindParam(':case',$case,PDO::PARAM_STR);
$query->bindParam(':reporteddate',$reporteddate,PDO::PARAM_STR);
$query->bindParam(':place',$place,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('case recorded successfully');</script>";
echo "<script>window.location.href='manage-case.php'</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";    
echo "<script>window.location.href='manage-case.php'</script>";
}}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> KIMILILI DigitalOb | BOOK CASES</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<script type="text/javascript">
    function checkisbnAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'isbn='+$("#isbn").val(),
type: "POST",
success:function(data){
$("#isbn-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script>
</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h2 class="header-line">RECORD NEW CASE</h2>
                
                            </div>

</div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="panel panel-info">
<div class="panel-heading">
</div>
<div class="panel-body">
<form role="form" method="post" enctype="multipart/form-data">

<div class="col-md-6">   
<div class="form-group">
<label>Reporter Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="reportername" autocomplete="off"  required />
</div>
</div>
<div class="col-md-6">   
<div class="form-group">
<label>National ID<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="idno" autocomplete="off"  required />
</div>
</div>
<div class="col-md-6">   
<div class="form-group">
<label>Phone Number<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="phoneno" autocomplete="off"  required />
</div>
</div>
<div class="col-md-6">   
<div class="form-group">
<label>OB NUMBER<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="obnumber" autocomplete="off"  required />
</div>
</div>
<div class="col-md-6">   
<div class="form-group">
<label>CASE INFO<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="case" autocomplete="off"  required />
</div>
</div>
<div class="col-md-6">   
<div class="form-group">
<label>DATE<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="reporteddate" autocomplete="off"  required />
</div>
</div>
<div class="col-md-6">   
<div class="form-group">
<label>LOCATION<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="place" autocomplete="off"  required />
</div>
</div>
<button type="submit" name="add" id="add" class="btn btn-info">ADD </button>
 </div>
</div>
                            </div>

        </div>
   
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
