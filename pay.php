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
</style>

</head>

<body>


		
		
		<div class="container">	
			<div class="row">
				<div class="col-xs-12 col-md-6">
							<ul class="nav nav-pills nav-stacked ">
								<li class="active">
								<a><span class="badge pull-right">Rs. <?php echo $_POST["amount"]; ?></span>Amount to be paid:</a>
								</li>
				   			 </ul>	
				
				
				    <div class="panel panel-default">
				        <div class="panel-heading">
				            <h3 class="panel-title">
				                Payment Details
				            </h3>
				            
				        </div>
				        <div class="panel-body">
				        	
				            <form role="form" action="fetch.php" method="POST">
				            <div class="form-group">
				               
				                <div class="input-group">
				                    <input type="number"  onKeyPress="if(this.value.length==16) return false;" class="form-control" name= "cardno" id="cardNumber" placeholder="Card Number"
				                        required autofocus />
				                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
				                </div>
				            </div>
				            <div class="row">
				                <div class="col-xs-7 col-md-7">
				                    <div class="form-group">
				                        
				                        <div class="col-xs-6 col-lg-6 pl-ziro">
				                            <input type="number" onKeyPress="if(this.value.length==2) return false;" class="form-control" name="mm" id="expityMonth" placeholder="MM" required />
				                        </div>
				                        <div class="col-xs-6 col-lg-6 pl-ziro">
				                            <input type="number" onKeyPress="if(this.value.length==2) return false;" class="form-control" name="yy" id="expityYear" placeholder="YY" required /></div>
				                    </div>
				                </div>
				                <div class="col-xs-5 col-md-5 pull-right">
				                    <div class="form-group">
				                        
				                        <input type="password" onKeyPress="if(this.value.length==3) return false;" class="form-control" name="cvv" id="cvCode" placeholder="CVV" required />
				                    </div>
				                </div>
				            </div>
				            <input type="integer" name="amt" class="amt" value="<?php echo $_POST["amount"]; ?>">
				            <button class="btn btn-success col-xs-11" type="Submit">Pay</button>
				            </form>
				        </div>
				    </div>
				    
				</div>
			</div>
		</div>
		



</body>

</html>





