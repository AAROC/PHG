<<?php

session_start();
session_destroy();
$home_url = 'https://' . $_SERVER['HTTP_HOST'];
header('Location: ' . $home_url);

?>
