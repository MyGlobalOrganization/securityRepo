<?php

if (isset($_GET["name"])) {
	$name = $_GET["name"];
	echo "Welcome $name"; // Noncompliant
}
if (isset($_GET["name"])) {
	$name = $_GET["name"];
	$safename = htmlspecialchars($name);
	echo "Welcome $safename"; // Compliant
}

?>