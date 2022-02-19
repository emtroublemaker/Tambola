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
            else{
                echo "Connection done!";
            }

        ?>