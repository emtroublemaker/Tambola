<?php 
    //Connecting to Database
    $host ="localhost";
    $user = "root";
    $pass ="";
    $db = 'randomized';

    //Creating a connection object
    $conn = mysqli_connect($host, $user, $pass, $db);
    echo "<br>";

    if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    echo "Connection was successful";
    echo "<br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user's page</title>
</head>
<body>

    <?php
        $i=0;
        $sql = "SELECT alternate FROM numbers ORDER BY ID DESC LIMIT 1;";
        if(mysqli_query($conn,$sql)){
            echo "";

            while($row = mysqli_fetch_array($sql)) {
                $i++;
                // echo "...";
            }
            $_POST['usernum'] = $usernum;
            // header("location:host.html");
        }
        else{
            echo "Error".mysqli_error($conn);
        }
    ?>
</body>
</html>





