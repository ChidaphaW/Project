<?php
include "config.php";

// if the form's update button is clicked, we need to process the form
if (isset($_POST['update'])) {
	$tasks = $_POST['tasks'];
	$tasks_id = $_POST['tasks_id'];
	$importance = $_POST['importance'];


	// write the update query
	$sql = "UPDATE `tasks` SET `tasks`='$tasks',`importance`='$importance' WHERE `id`='$tasks_id'";

	// execute the query
	$result = $conn->query($sql);

	if ($result == TRUE) {
		// echo "Record updated successfully.";
		header( "location: index.php" );
		exit(0);

	} else {
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$tasks_id = $_GET['id'];

	// write SQL to get user data
	$sql = "SELECT * FROM `tasks` WHERE `id`='$tasks_id'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			$id = $row['id'];
			$tasks = $row['tasks'];
			$importance = $row['importance'];
			
		}

?>
<!DOCTYPE html>
<html>		
	<head>
  <title>Edit Tasks.</title>
  	<meta name="viewport" content="width=device-width, initial-scale=1" >
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>		

<style>
	body {
  		background-image: url('bg.png');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
	}
</style>
<body>
<br>

  <div>
  	<button class="w3-btn w3-round-xxlarge"   onclick="location.href='index.php'">Back</button>
  </div><br>

	<form action="" method="post">
		<div class="w3-col m7">
			<div class="w3-row-padding">
     			 <div class="w3-col m12">
        			<div class="w3-card w3-round w3-white">
          				<div class="w3-container w3-padding">
            				<h6 class="w3-opacity">Edit Information.</h6>
           						Task:<br>
									<input class="w3-input w3-border w3-round-large" name="tasks" type="text" value="<?php echo $tasks; ?>">
									<input type="hidden" name="tasks_id" value="<?php echo $id; ?>">
            					<br>
           					 	Importance :<br>
            						<input class="w3-radio" type="radio" name="importance" value="Very important" <?php if ($importance == 'Very important') {
																	echo "checked";
																} ?>>Very important
            					<br><input class="w3-radio" type="radio" name="importance" value="Medium priority" <?php if ($importance == 'Medium priority') {
																		echo "checked";
																	} ?>>Medium priority
            					<br><input class="w3-radio" type="radio" name="importance" value="Less important" <?php if ($importance == 'Less important') {
																		echo "checked";
																	} ?>>Less important
								<br><br>
				
           <input type="submit" name="update" value="update" class="w3-button w3-theme">

		  				</div>
        			</div>
      			</div>
			</div>
		</div>
	</form>
</body>

</html>




<?php
	} else {
		// If the 'id' value is not valid, redirect the user back to index.php page
		header('Location: index.php');
	}
}
?>
