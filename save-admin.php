<?php
	// connection
	require './inc/database.php';
	// variables
	$pet_race = $_POST['pet_race'];
	$pet_name = $_POST['pet_name'];
	$pet_age = $_POST['pet_age'];
    $owner_name = $_POST['owner_name'];
	$password = $_POST['password'];
	$confirm = $_POST['confirm'];
	// validate inputs
	$ok = true;
	require './inc/header.php';
		if (empty($pet_race)) {
			echo '<p>required</p>';
			$ok = false;
		}
		if (empty($pet_name)) {
			echo '<p>required</p>';
			$ok = false;
		}
		if (empty($pet_age)) {
			echo '<p>required</p>';
			$ok = false;
		}
        if (empty($owner_name)) {
			echo '<p>required</p>';
			$ok = false;
		}
		if ((empty($password)) || ($password != $confirm)) {
			echo '<p>passwords</p>';
			$ok = false;
		}
	// decide if we are saving or not
	if ($ok){
		$password = hash('sha512', $password);
		// set up the sql
		$sql = "INSERT INTO newpatient (pet_race, pet_name, pet_age, owner_name, password) 
		VALUES ('$pet_race', '$pet_name', '$pet_age', '$owner_name', '$password');";
		$conn->exec($sql);
    	echo '<section class="success-row">';
		echo '<div>';
		echo '<h3>Admin Saved</h3>';
		echo '</div>';
    	echo '</section>';
		header("Location: signin.php"); 
		
	}
	?>

<?php require './inc/footer.php'; ?>
