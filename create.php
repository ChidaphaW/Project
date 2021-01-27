<?php
include "config.php";

// if the form's submit button is clicked, we need to process the form
if (isset($_POST['submit'])) {
  // get variables from the form
  $tasks = $_POST['tasks'];
  $importance = $_POST['importance'];


  //write sql query

  $sql = "INSERT INTO `tasks`(`tasks`, `importance`) VALUES ('$tasks','$importance')";

  // execute the query

  $result = $conn->query($sql);

  if ($result == TRUE) {
    // echo "New record created successfully.";
    header( "location: index.php" );
    exit(0);
  } else {
    echo "Error:" . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Add Tasks.</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

</html>