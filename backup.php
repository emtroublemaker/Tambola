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

$sql = "INSERT INTO `numbers`(`ID`, `alternate`) VALUES ('2','25')";
if(mysqli_query($conn,$sql)){
    echo "<br>";
    echo "Added Succssfully";
    // print_r($num);
}
else{
    echo "Error".mysqli_error($conn);
}


?>