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
        $txt = 'cgi-bin/cardno.txt';
        $fh = fopen($txt, 'r');
  	$cardno = fgets($fh);
  	fclose($fh);

        $txt = 'cgi-bin/amount.txt';
        $fh = fopen($txt, 'r');
        $amount = fgets($fh);
        fclose($fh);

        $db =   mysqli_connect("localhost","root","","project");

        $res=mysqli_query($db,"select * from card where cardno = '$cardno'");
        while($arr=mysqli_fetch_row($res))
        echo "<h1> Hello $arr[1], Verify using pin.<br>Your Current Balance is: Rs. $arr[5]. <br> $amount will be debited.</h1>";

        ?>
        <br>
        
        <form action="done.php" method="POST">
                <input type="integer" name="amt" class="amt" value="<?php echo "$amount"; ?>" >
                <input type="integer" name="cardno" class="amt" value="<?php echo "$cardno"; ?>" >
                <div class="col-xs-4 col-md-4">
                <div class="form-group">
                    <input type="password" class="form-control" onKeyPress="if(this.value.length==4) return false"; name="pin" id="pin" placeholder="Enter 4-digit Pin" required />
                </div>
            </div><br>
                <button type="submit" class="btn2 btn-info" style="vertical-align:middle"><span>Pay Now</span></button>
        </form>
        
                        
        </body>

        </html>