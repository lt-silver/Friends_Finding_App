<html>
<head>
<title>Upload Form</title>
</head>
<body>

<h2>Upload your Picture!</h2><hr>
<p> Must be a png file </p>
<?php echo $error;?>
<?php echo form_open_multipart('do_upload');?>
<input type="file" name="userfile" size="20" />
<br /><br />
<input type="submit" value="upload" />
</form>

</body>
</html>