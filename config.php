<?php
session_start();

$host = 'localhost';
$user = 'root';
$pass = "";
$db = "cart";

$conn = mysqli_connect($host, $user, $pass, $db) or die("Connection Failed.");
