<?php
session_start();
$tropfenzahl = $_SESSION['tropfenzahl'];
$tropfenzahl = $tropfenzahl - 1;
$_SESSION['tropfenzahl'] = $tropfenzahl;
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>