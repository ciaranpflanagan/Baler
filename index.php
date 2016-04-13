<?php 
session_start();
$price = intval($_SESSION['price']);
?>
<!DOCTYPE html>
<html lang="en">
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- Including Main CSS File -->
<link rel="stylesheet" href="css/main.css">

	<meta charset="UTF-8">
	<title>Baler</title>
</head>
<script type="text/javascript">

    // Setting Variables
    var clicks = 0;
    var total = 0;
    var price = <?php echo $price; ?>;
    
    // Counter Function
    function count() {
        document.getElementById("total").style.display = "none";
        document.getElementById("clicks").style.display = "inline";
        clicks += 1;
        document.getElementById("clicks").innerHTML = clicks;
    };

    // Finishing Function
    function finish() {
    	total = clicks * price;
    	total = "€ ".concat(total);
    	document.getElementById("clicks").style.display = "none";
        document.getElementById("total").style.display = "inline";
    	document.getElementById("total").innerHTML = total;
    }

    // Reset Function
    function reset() {
        clicks = 0;
        total = 0;
        document.getElementById("clicks").style.display = "inline";
        document.getElementById("total").style.display = "none";
        document.getElementById("clicks").innerHTML = clicks;
    }
</script>
<body>
    <div class="col-md-8 text-center col-md-offset-2" style="background-color: white;">
      <div class="login-form">
        <div class="counter">
            <h1 class="counting-number"><b id="clicks">0</b><b id="total"></b></h1>
        </div>
        <div class="buttons">
            <div class="counting-buttons"><button type="button" onClick="count()" class="counting-button btn btn-default">Bale Out</button><button type="button" onClick="finish()" class="counting-button btn btn-default">Finish</button><button type="button" onClick="reset()" class="counting-button btn btn-default">Reset</button></div>
        </div>
        <div class="settings">
            <a href="settings.php">Settings</a>
        </div>
      </div>
    </div>
</body>
</html>