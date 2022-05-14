<?php

// DB Configuration
include('config.php'); 

// Select Queries to get user's data who has the name = $_POST[from] / $_POST[to]
$sql="SELECT * FROM users WHERE name='$_POST[from]'";
$sql2="SELECT * FROM users WHERE name='$_POST[to]'";

// Execute those Queries
$result_sender = $conn->query($sql);
$result_reciever = $conn->query($sql2);

// Store the current balance of the sender and the current balance of the reciever
$balance_sender=$result_sender->fetch_assoc()['balance'];
$balance_reciever=$result_reciever->fetch_assoc()['balance'];

if($_POST['to']!="" && $_POST['amount']!=""){

// Checks that the balance of the sender is greater than or equal the amount entered to be transfered
if($balance_sender>=$_POST['amount'] && $_POST['from']!=$_POST['to'])
{

  // UPDATE Query to update the sender's balance by subtracting the amount from it
  // UPDATE Query to update the reciever's balance by adding the amount from it
  $sql="UPDATE users SET balance = $balance_sender-$_POST[amount] WHERE name='$_POST[from]'";
  $sql2="UPDATE users SET balance = $balance_reciever+$_POST[amount] WHERE name='$_POST[to]'";

  // Execute Those Queries and ensure that they are executed
  if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) 
  {
    // INSERT Query into transactions table to insert the sender's name, reciever's name and the amount transferred.
    $sql="INSERT INTO transactions (sender, receiver, amount) VALUES ('$_POST[from]', '$_POST[to]', '$_POST[amount]')";
        
    // Execute the Query and ensure that it is executed
    if ($conn->query($sql) === TRUE)
    {
      // Go to view-transactions.php in case of inserting the record in DB successfully
      echo"<script type='text/javascript'>
      window.location = 'view-transactions.php'
      </script>";
    }
        
    else
    {
      echo "Error adding record: " . $conn->error;
    }
  }
      
  else 
  {
    echo "Error updating record: " . $conn->error;
  }
}
else
{
  // storing the ID of the sender to be used down to redirect to transact.php of the chosen sender
  $id=$_POST['id'];
  
  echo "<script> alert('Insufficient current balance to transfer/ or the recipient chosen is the sender!');</script>";
  
  // Go back to transact.php to re-enter correct sender or amount 
  echo
  "<script type='text/javascript'>
  window.location = 'transact.php?id=$id';
  </script>";
}
}else{ 
  // If No Recipient is selected or the amount is empty
  echo "<script>alert('There is missing data not entered! Please Check again');</script>";

 echo"<script type='text/javascript'>
window.location = 'transact.php?id=$id';
</script>";
}

?>