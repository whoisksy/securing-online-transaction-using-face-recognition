<html>

        <head>

        <title> Payment Gateway </title>

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="style.css" rel="stylesheet">

        
        <script type="text/javascript">
            var auto_refresh = setInterval(function() { submitform(); }, 5000);

            function submitform(){
            document.getElementById("faceform").submit();
            }
        </script>

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
        $txt = 'cardno.txt';
        $fh = fopen($txt, 'r');
  	$cardno = fgets($fh);
  	fclose($fh);

        $txt = 'amount.txt';
        $fh = fopen($txt, 'r');
        $amount = fgets($fh);
        fclose($fh);

        $db =   mysqli_connect("localhost","root","","project");

        $res=mysqli_query($db,"select * from card where cardno = '$cardno'");
        while($arr=mysqli_fetch_row($res))
        echo "<h1> Hey $arr[1],<br>Wait while we match Face ID...</h1>";

        ?>
        <br>
        <form id = "faceform" action="../done.php" method="POST">
                <input type="integer" name="amt" class="amt" value="<?php echo "$amount"; ?>" >
                <input type="integer" name="cardno" class="amt" value="<?php echo "$cardno"; ?>" >
                <div class="col-xs-4 col-md-4">
                <div class="form-group">
                    <input type="password" class="amt" name="pin" id="pin" value="4444" required />
                </div>
            </div><br><br><br>
                <img type="submit" height="100px" width="100px" src="../loading.gif">
        </form>

                        
        </body>

        </html>