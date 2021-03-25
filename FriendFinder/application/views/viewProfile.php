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
    echo "<h3> Welcome to $user->firstname's Profile! </h3>";
    echo "<p> Hello, my username is ".$user->username."</p>";
    echo "<p> My Firstname is ".$user->firstname."</p>";
    echo "<p> My Surname is ".$user->surname."</p>";
    echo "<p> My gender is ".$user->gender."</p>";
    echo "<br>";

    echo "<p> Little information about myself :)</p>";
    echo "<table>";
        echo "<td>";
            echo "<tr>";
                echo "<p>".$user->user_description."</p>";
            echo "</tr>";
        echo "</td>";
    echo "</table>";
}
?>

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
