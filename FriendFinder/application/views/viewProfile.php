<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $appName;?></title>
</head>
<body>

<?php foreach($checkUser as $user)
{
    $username = $user->username;
    $firstname = $user->firstname;
    $surname = $user->surname;
    $gender = $user->gender;
    $user_description = $user->user_description;
}
?>

<h3> Welcome to <?php echo $firstname;?>'s Profile! </h3>
<p> Profile Picture </p>
<img src="<?php echo base_url();?>images/<?php echo $username;?>.png" alt="Profile Picture" width="150" height="150">
<p> Hello, my username is <?php echo $username;?></p>
<p> My Firstname is <?php echo $firstname;?></p>
<p> My Surname is <?php echo $surname;?></p>
<p> My gender is <?php echo $gender;?></p>
<br>
    <p> Little information about myself :)</p>
    <table>
        <td>
            <tr>
                <p><?php echo $user_description;?></p>
            </tr>
        </td>
    </table>


<p> My hobbies Include! </p>
<table>
<td>
<tr>

<?php 
foreach($checkUserHobbies as $user)
{
    echo "<p>".$user->hobby_name."</p>";
}
?>

</tr>
</td>
</table>
