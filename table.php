
<?php

require_once "config.php";

/* check connection */
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die;
}

if(isset($_POST['submitbtn'])) {
  $ticket = $_POST['array_data'];
  $ticket = serialize($ticket);

  $ticket_inuse = $_POST['inuse_array_data'];
  $ticket_inuse = serialize($ticket_inuse);

  $query = "insert into ticket(ticket, ticket_inuse) values('$ticket', '$ticket_inuse')";
  print_r($ticket);
  if(mysqli_query($conn, $query)){
    echo "sent to db";
  }

//for updating changes in ticket 
  // $ticket_inuse = $_POST['inuse_array_data'];
  // $ticket_inuse = serialize($ticket_inuse);
  // $query_inuse  = "update into ticket(ticket_inuse) values('$ticket_inuse')";
  // print_r($ticket_inuse);
  // if(mysqli_query($conn, $query_inuse)){
  //   echo "sent to db";
  // }

  header("location:table.html");
}



?>
