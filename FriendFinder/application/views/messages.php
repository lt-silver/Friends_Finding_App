<?php
foreach($checkUser as $user)
{
    $private = $user->private;
    $username = $user->username;
}
if ($private == "No" || $this->session->username == $username)
{
?>
<h1> My posts! </h1>
<hr>
<h5> Write new post </h5>
<form action="" method="POST">
<textarea name="message" rows="4" cols="50"></textarea>
<br>
<button type="submit" name="send_post">Post</button>  
</form>

<h5> My old posts </h5>

<?php

foreach($checkUserPosts as $post)
{

$sender = $this->Welcome_model->checkUserById($post->senderID);

foreach($sender as $senderInfo)
{
  $senderUsername = $senderInfo->username;
  $senderFirstname = $senderInfo->firstname;
  $senderSurname = $senderInfo->surname;
}
$time = $post->time;
$date = $post->date;
$userChatID = $post->userChatID;
$senderID = $post->senderID;
$recieverID = $post->recieverID;

?>
<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="mr-auto">  <?php echo $senderUsername." "."(".$senderFirstname." ".$senderSurname.")";?> </strong>
    <small><?php echo $time." ".$date ?></small>
    <form action="" method="POST">
    <input type="hidden" name="deleteID" value="<?php echo $userChatID; ?>">
    <input type="hidden" name="senderID" value="<?php echo $senderID; ?>">
    <input type="hidden" name="recieverID" value="<?php echo $recieverID; ?>">
    <button type="submit" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" name="delete">
      <span aria-hidden="true">&times;</span>
    </button>
    </form>
  </div>
  <div class="toast-body">
  <?php echo $post->message;?> 
  </div>
</div>
<?php
}
}

?>  