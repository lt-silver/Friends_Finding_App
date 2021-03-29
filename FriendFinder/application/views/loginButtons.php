<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $appName;?></title>
</head>
<body>

<p>Currently Logged in as
<?php 
echo $this->session->username;
?>
</p>

<form action="logout" method="POST">
 <button type="submit">Logout</button>  
</form>

<form action="hub" method="POST">
 <button type="submit">Back to my Profile</button>  
 </form>