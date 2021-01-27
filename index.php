<?php
include "config.php";

//write the query to get data from users table

$sql = "SELECT * FROM tasks";

//execute the query

$result = $conn->query($sql);

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
	<title>To Do List</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">

    <!-- ส่วนตาราง -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <style>
    body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
    body {font-size:16px;}
    .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
    .w3-half img:hover{opacity:1}
    </style>

	<!-- to make it looking good im using bootstrap -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
      <!-- Header -->
      <br>
        <br>
      <header class="w3-container w3-green w3-center" style="padding:16px 16px">
        <h1 class="w3-margin w3-jumbo">Tasks List.</h1>
        <p class="w3-large">It’s going to be hard, but hard does not mean impossible.</p>
        <hr style="width:1100px;border:4px solid Sand" class="w3-round">

        <form action="" method="POST">
        <div class="w3-col m7">
            <input class="w3-input w3-border w3-text-black" name="tasks" type="text" placeholder="Task." contenteditable="true" >
            <br>
            <select class="w3-select w3-text-black"  name="importance">
            <option class=w3-text-black value="" disabled selected>Choose your importance</option>
              <option class=w3-text-black value="Very important">Very important</option>
              <option class=w3-text-black value="Medium priority">Medium priority</option>
              <option class=w3-text-black value="Less priority">Less priority</option>
            </select>
            </div>
            <br>
        <button type="submit" name="submit" value="submit" class="w3-white w3-button w3-round-xxlarge w3-padding-large  w3-margin-top" onclick="location.href='create.php'" ><i class="fa fa-pencil"></i> Add Task.</button>
    </header>
        <br>
        <br>
        </form >

		<table class="w3-table w3-striped">
		<thead>
				<tr>
                <th>Number</th>
				<th>Tasks</th>
				<th>Importance</th>

				</tr>
            </thead>
            
			<tbody>
				<?php
				if ($result->num_rows > 0) {
					//output data of each row
					$no = 1;
					while ($row = $result->fetch_assoc()) {
				?>

						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $row['tasks']; ?></td>
							<td><?php echo $row['importance']; ?></td>
							<td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
						</tr>
						<?php $no = $no + 1 ; ?>
				<?php		}
				}
				?>

			</tbody>
		</table>
	</div>

</body>

</html>