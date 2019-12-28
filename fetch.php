<html>

<head>

<title> Payment Gateway </title>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="style.css" rel="stylesheet">

<style>
.amt
{
	display:none;
}

.btn {
	border-radius:35px;
	font-size: 20px;
}

</style>



</head>




<body>
								
<?php
$cardno=$_POST['cardno'];
$mm=$_POST['mm'];
$yy=$_POST['yy'];
$cvv=$_POST['cvv'];
$amount=$_POST['amt'];

file_put_contents('cgi-bin/cardno.txt', $cardno);
file_put_contents('cgi-bin/amount.txt', $amount);

$db =   mysqli_connect("127.0.0.1","root","admin@sql","project");

$res=mysqli_query($db,"select * from card where cardno = '$cardno' and cvv = '$cvv'");
if($arr=mysqli_fetch_row($res))
{

	if ($arr[5] >= $amount)
	{
	echo "<h1> Hello $arr[1],<br>Your Current Balance is: Rs. $arr[5] </h1>";
	echo '<br>
	<form action="detector.py" method="POST">
		<br><input type="integer" id = "amt" name="amt" class="amt" value="<?php echo $amount; ?>">
		<input type="integer" id = "cardno" name="cardno" class="amt" value="<?php echo $cardno; ?>">
		<div class="col-xs-4 col-md-4">
	        
	    </div><br>
		<button type="submit" class="btn btn-info"> Tap to pay '; echo "$amount"; echo ' using Face ID</button>
	</form>';
	}

	else
	{
		echo "<br><br><h1> $arr[1],<br> You Have Insufficient Balance.</h1>";
		echo '<br>
			<form action="index.html" method="POST">
				
				<br><button type="submit" class="btn2 btn-info" style="vertical-align:middle"><span>Retry</span></button>
			</form>';
	}
}
else
echo '<br><br><h1>Card details not found.</h1>
		<br>
<form action="index.html" method="POST">
	<br>
	<button type="submit" class="btn2 btn-info" style="vertical-align:middle"><span>Retry</span></button>
</form>';

?>


		
</body>

</html>
