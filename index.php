<?php
// Get the base URL
$baseURL = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

// Create the URL for the "viewers" folder
$viewersURL = rtrim($baseURL, "/") . "/admin";

// Send the "Location" header
header("Location: $viewersURL");
exit();
