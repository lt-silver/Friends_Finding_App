
<?php echo validation_errors(); ?>

<?php echo form_open('users/login'); ?>
    <div class="container">
        <h1><?= $title ?></h1>
        <div class="form-group">
            <p>Please Log in to your account</p>
            <hr>
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" id="username">

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password">

            <hr>
            <button type="submit" class="registerbtn">Log In</button>     
        </div>
    </div>
<?php echo form_close(); ?>


