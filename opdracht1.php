<?php
  require "classes/message.php";

  $message = new message();

  $message->setSubject("hallo");
  $message->setMessage("abcdefghijklmnopqrstuvwxyz");

  echo $message->getSubject();
  echo "<br>".$message->getMessage();


 ?>
