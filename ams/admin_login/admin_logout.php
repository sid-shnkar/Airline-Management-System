<?php

session_start();
session_unset();
session_write_close();
$url = "./admin_login.php";
header("Location: $url");
