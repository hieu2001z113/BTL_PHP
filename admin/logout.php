<?php
include_once 'check_log.php';
session_start();
session_destroy();
header('Location: login.php')
?>