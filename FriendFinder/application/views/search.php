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
<input type="text" name="search">
<button type="submit" name="searchByName">Search by Name</button>

<select name="hobbySearch">
<option value="0">- No Hobby Preffrence -</option>
<?php 
foreach($hobbies as $hobby)
{
    echo "<option value=".$hobby->hobbyID.">".$hobby->hobby_name."</option>";
}
?>
</select>

<button type="submit" name="searchByHobby">Search by Hobby</button>
</form>
<?php  
if(null !==($this->input->post('searchByHobby')))
{
	if ($this->input->post('hobbySearch') != 0)
	{
		echo "<p>Seach Results</p>";
		foreach ($seachResult->result() as $row)  
		{  
			echo "<table>";
				echo "<tr>";
					echo "<td>";?> <img src="<?php echo base_url();?>images/<?php echo "$row->username";?>.png" alt="Profile Picture" width="50" height="50"> <?php echo "</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td><strong>Username: </strong></td>";
					echo "<td>".$row->username."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td><strong>Full name: </strong></td>";
					echo "<td>".$row->firstname."</td>";
					echo "<td>".$row->surname."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td>"; ?><form action="" method="POST"> <button type="submit"name="<?php echo"$row->username"?>">View Profile</button></form><?php echo"</td>";
				echo "</tr>";
			echo "</table>";
		}
	}
	else
	{
		echo "<p>Please select a Hobby to search</p>";
	}
}

//Search By name
if(null !==($this->input->post('searchByName')) )
{
	if ($this->input->post('search') != null)
	{
		echo "<p>Seach Results</p>";
		foreach ($seachResult->result() as $row)  
		{  
			echo "<table>";
				echo "<tr>";
					echo "<td>";?> <img src="<?php echo base_url();?>images/<?php echo "$row->username";?>.png" alt="Profile Picture" width="50" height="50"> <?php echo "</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td><strong>Username: </strong></td>";
					echo "<td>".$row->username."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td><strong>Full name: </strong></td>";
					echo "<td>".$row->firstname."</td>";
					echo "<td>".$row->surname."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td>"; ?><form action="" method="POST"> <button type="submit"name="<?php echo"$row->username"?>">View Profile</button></form><?php echo"</td>";
				echo "</tr>";
			echo "</table>";
		}
	}
	else
	{
		echo "<p>Please enter a Firstname, Surname or Username to search</p>";
	}
}
?>