<?php

session_start();
session_unset();
session_write_close();
$url = "./passenger_login.php";
header("Location: $url");
