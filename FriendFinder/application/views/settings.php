<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $appName;?></title>
</head>
<body>

<form action="" method="POST">
<?php 

foreach($checkUser as $user)
{
    $firstname = $user->firstname;
    $surname = $user->surname;
    $gender = $user->gender;
    $email = $user->email;
    $phone = $user->phone_number;
    $user_description = $user->user_description;
}

$i = 0;
foreach($checkUserHobbies as $hobby)
{
    $i +=1;
    ${"hobby".$i} = $hobby->hobbyID;
    ${"hobby_name".$i} = $hobby->hobby_name;
}
?>
<h2>Current Profile Picture</h2><hr>
<img src="<?php echo base_url();?>images/<?php echo $this->session->username;?>.png" alt="Profile Picture" width="150" height="150">

<h2>User Information</h2><hr>
<p>Firstname: <input type="text" name="firstname" value="<?php echo $firstname ?>" required></p>
<p>Surname: <input type="text" name="surname" value="<?php echo $surname ?>" required></p>
<p>Gender: <input type="text" name="gender" value="<?php echo $gender ?>" required></p>
<p>Email: <input type="text" name="email" value="<?php echo $email ?>" required></p>
<p>Phone Number: <input type="text" name="phone" value="<?php echo $phone ?>" required></p>
<p>User Bio </p>
<p><textarea name="user_description" rows="4" cols="50"><?php echo $user_description?></textarea></p>

<h2>Hobbies</h2><hr>
<p> Please select your first hobby </p>
<select name="hobby1">
<optgroup label="Previous set value">
<option value="<?php echo $hobby1; ?>"><?php echo $hobby_name1?></option>
</optgroup>
<optgroup label="Options">
<?php 
foreach($hobbies as $hobby)
{
    echo "<option value=".$hobby->hobbyID.">".$hobby->hobby_name."</option>";
}
?>
</optgroup>
</select>

<p> Please select your second hobby </p>
<select name="hobby2">
<optgroup label="Previous set value">
<option value="<?php echo $hobby2; ?>"><?php echo $hobby_name2?></option>
</optgroup>
<optgroup label="Options">
<?php 
foreach($hobbies as $hobby)
{
    echo "<option value=".$hobby->hobbyID.">".$hobby->hobby_name."</option>";
}
?>
</optgroup>
</select>

<p> Please select your third hobby </p>
<select name="hobby3">
<optgroup label="Previous set value">
<option value="<?php echo $hobby3; ?>"><?php echo $hobby_name3?></option>
</optgroup>
<optgroup label="Options">
<?php 
foreach($hobbies as $hobby)
{
    echo "<option value=".$hobby->hobbyID.">".$hobby->hobby_name."</option>";
}
?>
</optgroup>
</select>
<br><br>


<button type="submit"name="update_user">Save Settings</button>
</form>


<form action="hub" method="POST">
 <button type="submit">Back to my Profile</button>  
 </form>