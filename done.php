<html>




<head>

<title> Payment Gateway </title>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="style.css" rel="stylesheet">

<style>
.btn {
	border-radius:35px;
	font-size: 20px;
}

</style>


</head>

<body>
								
<?php
$cardno=$_POST['cardno'];
$amount=$_POST['amt'];
$pin=$_POST['pin'];

$db =   mysqli_connect("localhost","root","","project");

$qr = "update card set balance = balance - $amount where cardno = '$cardno' and pin = '$pin'";
mysqli_query($db,$qr);


$res=mysqli_query($db,"select * from card where cardno = '$cardno' and pin='$pin'");





if($arr=mysqli_fetch_row($res))
{

echo "<h1> Thank you! Successfully Paid $amount.<br>Your Updated Balance is: Rs. $arr[5] </h1>";
echo '<form action="index.html">
<br><br><button type="submit" class="btn2 btn-info" style="vertical-align:middle"><span>Done</span></button>
</form>';
}
else
{
echo "<h1>Face ID does not match.</h1>";
echo '<form action="pin.php">
<br><br>
<button type="submit" class="btn2 btn-info" style="vertical-align:middle"><span>Pay Using PIN</span></button>
</form>';
}
?>

		
</body>

</html>
