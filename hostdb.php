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

            if(isset($_POST['btn']))
                $backval = $_POST['backval'];


            $sql = "INSERT INTO `numbers`(`ID`, `alternate`) VALUES ('',$backval)";
            if(mysqli_query($conn,$sql)){
                echo "";
                header("location:host.html");
            }
            else{
                echo "Error".mysqli_error($conn);
            }

            // echo "<script>console.log(randomArr);</script>"


        ?>