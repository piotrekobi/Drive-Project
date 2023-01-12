<?php
// Access denied
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$httpProtocol = !isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on' ? 'http' : 'https';

$base = $httpProtocol.'://'.$_SERVER['HTTP_HOST'].'/';
if (!isset($_SESSION['username']))
{
    exit(header("Location:".$base. "index.php"));
}
$path = $_GET['file'];
$parts = explode("/", $path);
$users = json_decode(file_get_contents('users.json'), true);
if($users[$_SESSION['username']]['rootFolder'] != $parts[1]){
    exit(header("Location:".$base. "index.php?location=Home"));
}
?>