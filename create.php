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
