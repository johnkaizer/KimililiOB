<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])){   
header('location:index.php');
}
else{ 

if(isset($_POST['add']))
{
$suspectname=$_POST['suspectname'];
$nationid=$_POST['nationid'];
$phone=$_POST['phone'];
$arrdate=$_POST['arrdate'];
$reason=$_POST['reason'];
$place=$_POST['place'];

{
$sql="INSERT INTO  suspectstbl(SuspectName,NatId,Phone,ArrDate,Reason,Place) VALUES(:suspectname,:nationid,:phone,:arrdate,:reason,:place)";
$query = $dbh->prepare($sql);
$query->bindParam(':suspectname',$suspectname,PDO::PARAM_STR);
$query->bindParam(':nationid',$nationid,PDO::PARAM_STR);
$query->bindParam(':phone',$phone,PDO::PARAM_STR);
$query->bindParam(':arrdate',$arrdate,PDO::PARAM_STR);
$query->bindParam(':reason',$reason,PDO::PARAM_STR);
$query->bindParam(':place',$place,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Suspect Added successfully');</script>";
echo "<script>window.location.href='manage-suspects.php'</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";    
echo "<script>window.location.href='manage-suspects.php'</script>";
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
    <title>KIMILILI POLICE DIGITALOB | Add SUSPECTS</title>
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
                <h2 class="header-line">BOOK SUSPECT</h2>
                
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
<label>Suspect Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="suspectname" autocomplete="off"  required />
</div>
</div>
<div class="col-md-6">  
<div class="form-group">
<label>ID Number<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="nationid"  required="required" autocomplete="off" onBlur="checkisbnAvailability()"  />
         <span id="isbn-availability-status" style="font-size:12px;"></span>
</div></div>

<div class="col-md-6">  
 <div class="form-group">
 <label>Phone Number<span style="color:red;">*</span></label>
 <input class="form-control" type="text" name="phone" autocomplete="off"   required="required" />
 </div>
</div>
<div class="col-md-6">  
 <div class="form-group">
 <label>Reason For Arrest<span style="color:red;">*</span></label>
 <input class="form-control" type="text" name="reason" autocomplete="off"   required="required" />
 </div>
</div>
<div class="col-md-6">  
 <div class="form-group">
 <label>Arrested Date<span style="color:red;">*</span></label>
 <input class="form-control" type="text" name="arrdate" autocomplete="off"   required="required" />
 </div>
</div>
<div class="col-md-6">  
 <div class="form-group">
 <label>Location Arrested<span style="color:red;">*</span></label>
 <input class="form-control" type="text" name="place" autocomplete="off"   required="required" />
 </div>
</div>
<button type="submit" name="add" id="add" class="btn btn-info">BOOK SUSPECT </button>
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