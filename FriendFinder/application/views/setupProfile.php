<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $appName;?></title>
</head>
<body>
<p> First Time here? </p>
<p> Lets set your profile up! </p>

<form action="" method="POST">
<p> Please select your first hobby </p>
<select name="firstHobby">
<option value=""></option>
<?php 
foreach($hobbies as $hobby)
{
    echo "<option value=".$hobby->hobbyID.">".$hobby->hobby_name."</option>";
}
?>
</select>

<p> Please select your second hobby </p>
<select name="secondHobby">
<option value=""></option>
<?php 
foreach($hobbies as $hobby)
{
    echo "<option value=".$hobby->hobbyID.">".$hobby->hobby_name."</option>";
}
?>
</select>

<p> Please select your third hobby </p>
<select name="thirdHobby">
<option value=""></option>
<?php 
foreach($hobbies as $hobby)
{
    echo "<option value=".$hobby->hobbyID.">".$hobby->hobby_name."</option>";
}
?>
</select>

<p> Tell us a little about yourself </p>
<textarea name="user_description" rows="4" cols="50">
</textarea>

<br><br>
<button type="submit">Complete</button>


</form>