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
<button type="submit">Search</button>
</form>

<?php  
if(null !==($this->input->post('search')) )
{
	if ($this->input->post('search') != null)
	{
		echo "<p>Seach Results</p>";
		foreach ($seachResult->result() as $row)  
		{  
			echo "<table>";
				echo "<tr>";
					echo "<td>".$row->firstname."</td>";
					echo "<td>".$row->surname."</td>";
					echo "<td>"; ?><form action="" method="POST"> <button type="submit"name="<?php echo"$row->username"?>">View Profile</button></form><?php echo"</td>";
				echo "</tr>";
			echo "</table>";
		}
	}
	else
	{
		echo "<p>Please enter a Firstname or Surname to search</p>";
	}
}
?>