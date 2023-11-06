<?php
session_start();

// Unset or destroy the session variables
session_unset();
session_destroy();

// Redirect to the login page (index.html)
header("Location: index.html");
exit();
?>
