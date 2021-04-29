<div class="container">
<h1><?= $title ?></h1> <!-- gets title from view function in controller -->
<?php echo validation_errors(); ?>

<?php echo form_open('signup'); ?>
    <div class="form-group">
        <p>Please fill in this form to create an account.</p>
        <hr>

        <h2>Login Details</h2>
        
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" id="username" required>
<br>
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>
<br>
        <label for="password_repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="password_repeat" id="password_repeat" required>
        <hr>
        <h2>Personal Details</h2>
<br>
        <label for="firstname"><b>Name(s)</b></label>
        <input type="text" placeholder="Enter Name(s)" name="firstname" id="firstname" required>
<br>
        <label for="surname"><b>Surname</b></label>
        <input type="text" placeholder="Enter Surname" name="surname" id="surname" required>
<br>
        <label for="phone_number"><b>Phone Number</b></label>
        <input type="text" placeholder="Enter phone number" name="phone_number" id="phone_number" required>
<br>
        <label for="email"><b>Email address</b></label>
        <input type="text" placeholder="Enter Email Address" name="email" id="email" required>
<br>
        <label for="gender"><b>Gender</b></label>
        <input type="text" placeholder="Enter gender" name="gender" id="gender" required>
<br>
<hr>
<h2>Hobbies</h2>
<p> Please select your first hobby </p>
<select name="hobby1" required>
<option value=""></option>
<?php 
foreach($hobbies as $hobby)
{
    echo "<option value=".$hobby->hobbyID.">".$hobby->hobby_name."</option>";
}
?>
</select>

<p> Please select your second hobby </p>
<select name="hobby2" required>
<option value=""></option>
<?php 
foreach($hobbies as $hobby)
{
    echo "<option value=".$hobby->hobbyID.">".$hobby->hobby_name."</option>";
}
?>
</select>

<p> Please select your third hobby </p>
<select name="hobby3" required>
<option value=""></option>
<?php 
foreach($hobbies as $hobby)
{
    echo "<option value=".$hobby->hobbyID.">".$hobby->hobby_name."</option>";
}
?>
</select>

<p> Tell us a little about yourself </p>
<textarea name="user_description" rows="4" cols="50" required>
</textarea>

<br><br>
        <button type="submit" class="registerbtn">Register</button>
    </div>
</div>
    <div class="container signin">
        <p>Already have an account? <a href="<?php echo base_url(); ?>index.php/login">Sign in</a>.</p>
    </div>

   
<?php echo form_close(); ?>
