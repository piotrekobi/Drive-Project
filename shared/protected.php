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
?>