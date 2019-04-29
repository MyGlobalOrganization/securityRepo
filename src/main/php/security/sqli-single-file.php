<?php
$conn = new PDO('mysql:host=localhost;dbname=prod', $user, $pass);

if (isset($_POST['email'])) {
	$email = $_POST['email'];

	//$sql = "SELECT * FROM USERS WHERE email = '" . $email . "'";
	$sql = "SELECT * FROM USERS WHERE email = '$email'";
	
	$user = $conn->query($sql);
	if ($user->rowCount) {
		// do something
	}
}
?>