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
    // echo "Connection was successful";
    echo "<br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user's page</title>
</head>
<script>
function update() {
  $.get("user_main.php", function(data) {
    $("#fetch").html(data);
    window.setTimeout(update, 1000);
  });
}
</script>
<body onload="update()">
<div id="fetch">
    <?php
        $i=0;
        $sql = "SELECT  alternate FROM numbers ORDER BY ID DESC LIMIT 1;";
        // $result = mysqli_query($sql);
        if($result = mysqli_query($conn,$sql)){
            echo "";
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)){ 
                    echo $row["alternate"];
                    $i++;
                }
            // $_POST['usernum'] = $usernum;
            }
        }
        else{
            echo "Error".mysqli_error($conn);
        }
    ?>
</div>
</body>
</html>





