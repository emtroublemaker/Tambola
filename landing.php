
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
    // echo "Connection was successful";
}
echo "<br>";
$slot = 0 ;
$backval = 0;

// if(isset($_POST['btn']))
//     $slot = $_POST['slots'];
//     // echo $slot;
//     $backval = $_POST['backval'];
//     // echo $backval;


    $option = isset($_POST['slots'])? $_POST['slots']:false;
    if ($option){
        echo htmlentities($_POST['slots'], ENT_QUOTES, "UTF-8");
    }
    else{
        echo "is required";
        exit;
    }

    // $sql = "UPDATE `history` SET $slot = $backval WHERE $slot = 0 ORDER BY $slot DESC LIMIT 1";
    $sql = "INSERT INTO `host_table`(`gen_by_host`) VALUES ('backval')";
    // echo '<script>console.log($backval)</script>';
    if(mysqli_query($conn,$sql)){
    };
 ?>

<html>
    <head>
        <title>Start Page</title>
    </head>
    <style>
        .butt{  
            border: none;
            color: rgb(10, 9, 9);
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
    <body>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
            <label for="slots">Select Slot:</label>
            <select name="slots" id="slots" value="">
                <option value="" disabled selected></option>
                <option value="slot111">Slot1</option>
                <option value="slot112">Slot2</option>
                <option value="slot121">Slot3</option>
                <option value="slot122">Slot4</option>
                <option value="slot211">Slot5</option>
                <option value="slot212">Slot6</option>
                <option value="slot221">Slot7</option>
                <option value="slot222">Slot8</option>
            </select>
            <input type = "submit" name="submit"/>
            <br><br>

            <p id="myarrs"></p>
            <br/>
            <p id="number"></p>
            <br>
            <p id="history">Number history: </p>


            <input type = "hidden" name = "backval" id = "backval" value = ""/>
            <button type="button" id = "mybtn" class="butt" name = "btn" onclick="newnumber()"> Your Next Number is: </button>
            <!-- <input type="submit" value="Submit" name ="submit"> -->
            <!-- <button type="submit" class="butt"> Start Game</button> -->
        </form>

        <script>

        function shuffle(array) 
        {
        let currentIndex = array.length,  randomIndex;

        while (currentIndex != 0) {

        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex--;

        [array[currentIndex], array[randomIndex]] = [
        array[randomIndex], array[currentIndex]];
        }

        return array;
        }

        var arr = [1, 2 ,3 ,4 ,5 ,6 ,7 ,8 , 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25];
        shuffle(arr);

        function newnumber(){
                var randomArr = arr;//localStorage.getItem("randomarray");
                if(!localStorage.getItem("index"))
                {
                    localStorage.setItem("index", 0);
                    document.getElementById("history").innerHTML+=randomArr[0]+", ";
                    document.getElementById("number").innerHTML="Your next number is "+randomArr[0];
                    document.getElementById("backval").value = randomArr[0];
                } else{
                    var index = parseInt(localStorage.getItem("index"));
                    index+=1;
                    if(index<=arr.length-1){
                        // alert("index is: "+index);
                        localStorage.setItem("index",index);
                        document.getElementById("history").innerHTML+=randomArr[index]+", ";
                        document.getElementById("number").innerHTML="Your next number is "+randomArr[index];
                        document.getElementById("backval").value = randomArr[index];
                    } else{
                        alert("all numbers have been generated");
                    }
                }
            }            
        

        
        // document.write("Randomized array:"+arr);

    </script>
    </body>
</html>