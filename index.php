<?php
// connection string

$dsn = 'mysql:host=ca-cdbr-azure-central-a.cloudapp.net;dbname=videogamesdb';
$userName = 'b6ee96bd470785';
$password = 'dc381279';


// exception handling - use a try / catch
try {
    // instantiates a new pdo - an db object
    $db = new PDO($dsn, $userName, $password);

}
catch(PDOException $e) {
    $message = $e->getMessage();
    echo "An error occurred: " . $message;
}

$query = "SELECT * FROM games"; // SQL statement
$statement = $db->prepare($query); // encapsulate the sql statement
$statement->execute(); // run on the db server
$games = $statement->fetchAll(); // returns an array
$statement->closeCursor(); // close the connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COMP1006</title>
    <!-- CSS Section -->
    <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="./Scripts/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="./Content/app.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h1>PHP with MySQL</h1>

            <ul>
                <?php
                foreach($games as $game) {
                    echo '<li>' . $game['Id'] . " " . $game['Name'] . " " . $game['Cost'] .'</li>';
                }
                ?>
            </ul>

        </div>
    </div>
</div>

<!-- JavaScript Section -->
<script src="./Scripts/lib/jquery/dist/jquery.min.js"></script>
<script src="./Scripts/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./Scripts/app.js"></script>
</body>
</html>
