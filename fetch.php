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



$sql = "SELECT ticket FROM ticket ORDER BY ticket_id DESC LIMIT 1";
if($result = mysqli_query($conn,$sql)){
    echo "";
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)){
            // echo $row["ticket"];
            // print_r($row[0]);
            $inuse[]=$row;
            // print_r($inuse[0]['ticket']);
            $nums = unserialize($inuse[0]['ticket']);
            // print_r($nums);
        }
    }
}
else{
    echo "Error".mysqli_error($conn);
}
?>
<html>
    <title> Fetching </title>
    <style>
        th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
        table{
                text-align: center;
                margin-left: auto;
                margin-right: auto;
                border-collapse: collapse;
                width: 50%;
                height: 50%;
            }
        #tag{
            background-color: red;
            }

            .myTable{
            display: none;
            }
    </style>
    <body>
   <!-- <form method="POST"> -->
         <!-- <input type ="button" name="showbtn" onclick="myFunction()" value="Show ticket"/><br><br>
        <input type ="submit" name="submitbtn" value="send to db ticket"/><br><br>
        <input type="hidden" id="array_data" name = "array_data"/>
        <input type="hidden" id="inuse_array_data" name = "inuse_array_data"/>
        <label>
            Show ticket of this id :
        </label>
        <input type ="text" name="id_label" value=""/><br><br>
        <input type ="submit" name="returnbtn" value="show ticket"/><br><br> -->
    <!-- </form> -->
    <input type ="button" name="showbtn" onclick="myFunction()" value="Show ticket" id = "array_data"/><br><br>
        <!-- <input type ="submit" name="submitbtn" value="send to db ticket" id="inuse_array_data"/><br><br> -->
        <button name="bingobtn" id="bingobtn" class="bingobtn" onclick="checkTopWin()">Bingo TOP</button>
        <button name="bingobtn" id="bingobtn" class="bingobtn" onclick="checkMidWin()">Bingo MID</button>
        <button name="bingobtn" id="bingobtn" class="bingobtn" onclick="checBotWin()">Bingo Bottom</button>
        <script>

            inuse_arr = new Array(25).fill(0);
            passedArray = [];
            function myFunction() {
                var table = document.getElementById("myTable");

                passedArray = new Array(<?php echo ($nums);?>);
                var localarray = [];
                localStorage.setItem("localarray", (passedArray));
                for(i=0; i < 25; i++){
                    // abc.push()
                    document.getElementById(i).innerHTML = passedArray[i];
                } 

                // console.log(abc);
                
                

                document.getElementById("myTable").style.display = "inline" ;
                }

                function changeColor(elem, elemId){
                    var element = document.getElementById(elem);
                    elem.style.backgroundColor ="lightblue";
                    //inuse_arr.splice(elemId, 1, passedArray[elemId]);
                    // console.log(inuse_arr, elem, elemId);
                    inuse_arr[elemId] = passedArray[elemId];
                    // t.value = (inuse_arr);
                }


                function checkTopWin(){
                    var count = 0
                    for(i=0; i<=inuse_arr.length; i++){
                        for(j=0;j<=4; j++){
                            if(inuse_arr[i] == passedArray[j]){
                                count+=1;
                            }
                            
                        }
                        
                    }
                    console.log("top : "+count);
                }

                function checkMidWin(){
                    var count = 0
                    for(i=10; i<=inuse_arr.length; i++){
                        for(j=10;j<=14; j++){
                            if(inuse_arr[i] == passedArray[j]){
                                count+=1;
                            }
                            
                        }
                        
                    }
                    console.log("mid : "+count);
                }

                function checBotWin(){
                    var count = 0
                    for(i=20; i<=inuse_arr.length; i++){
                        for(j=20;j<=24; j++){
                            if(inuse_arr[i] == passedArray[j]){
                                count+=1;
                            }
                            
                        }
                        
                    }
                    console.log("Bot : "+count);
                }
            
        </script>

        <table id="myTable" class="myTable">
        <tr>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "0">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "1">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "2">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "3">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "4">cell</div></td>
        </tr>
        <tr>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "5">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "6">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "7">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "8">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "9">cell</div></td>
        </tr>
        <tr>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "10">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "11">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "12">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "13">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "14">cell</div></td>
        </tr>
        <tr>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "15">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "16">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "17">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "18">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "19">cell</div></td>
        </tr>
        <tr>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "20">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "21">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "22">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "23">cell</div></td>
            <td><div style ="background-color: #ffff00;" type="button"  onclick="changeColor(this, this.id)" id = "24">cell</div></td>
        </tr>
        </table>
    </body>
    </html>