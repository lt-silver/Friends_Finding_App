<h1><?= $title ?></h1> <!-- gets title from view function in controller -->
<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
    <div class="form-group">
        <p>Please fill in this form to create an account.</p>
        <hr>

        <h2>Login d</h2>
        
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" id="username">
<br>
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password" >
<br>
        <label for="password_repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="password_repeat" id="password_repeat" >
        <hr>
        <h2>Personal Details</h2>
<br>
        <label for="firstname"><b>Name(s)</b></label>
        <input type="text" placeholder="Enter Name(s)" name="firstname" id="firstname" >
<br>
        <label for="surname"><b>Surname</b></label>
        <input type="text" placeholder="Enter Surname" name="surname" id="surname" >
<br>
        <label for="phone_number"><b>Phone Number</b></label>
        <input type="text" placeholder="Enter phone number" name="phone_number" id="phone_number" >
<br>
        <label for="email"><b>Email address</b></label>
        <input type="text" placeholder="Enter Email Address" name="email" id="email" >
<br>
        <label for="gender"><b>Gender</b></label>
        <input type="text" placeholder="Enter gender" name="gender" id="gender" >
<br>
        <button type="submit" class="registerbtn">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="<?php echo base_url(); ?>users/login">Sign in</a>.</p>
    </div>

   
<?php echo form_close(); ?>
