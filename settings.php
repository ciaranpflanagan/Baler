<?php 
include '../config/init.php';
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
<body>
    <div class="col-md-8 text-center col-md-offset-2" style="background-color: white;">
    <div class="counter">
        <h1 class="price">Price</h1>
            <div class="col-md6">
                <form action="settings.php" method="post">
                    <input type="text" placeholder="0.00" name="price" class="form-control"><br/>
                    <input type="submit" value="Set" class="form-control">
                </form>
            </div>
    </div><br/>
    <div class="settings">
        <a href="index.php">Home</a>
    </div>
    </div>
<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Intizalising Errors Array
    $errors = array();

    // Checking for a price
    if (empty($_POST['price'])) {
        $errors[] = 'You forgot to enter a price!';
    }
    else
    {
        $price = mysqli_real_escape_string($dbc, trim($_POST['price']));
    }

// If everything is ok
if (empty($errors)) {  
    // Making the query
    $q = "INSERT INTO baler (user_name, price) VALUES ('$user_name', '$price');";
    $r = @mysqli_query ($dbc, $q); // Run the query
    
    // If it ran OK
    if ($r) {
    header("Location: index.php");        
    }
    // If it didn't run OK
    else
    {
        // Printing a message
        echo '<h1>System Error</h1>
        <p>You could not be registered in our database due to a system error. We\'ll look into it. Sorry for any inconvenience.</p>';
        
        // Debugging message
        echo '<p>' . mysqli_error($dbc) . '<br/><br/>Query: ' . $q . '</p>';
    } // End of ($r) if statement
    mysqli_close($dbc); // Closing the database connection
    
    exit();
}
// Reporting the Errors
else
{
    echo '<h1>Error!!!</h1>
    <p>The following error(s) have occurred:<br/>';
    foreach ($errors as $msg) {
        echo " - $msg<br/>\n";
    }
    echo '</p><p>Please try again. Thank You.</p><p><br/></p>';
} // End of (empty($errors)) if statement
}
?>
</body>
</html>