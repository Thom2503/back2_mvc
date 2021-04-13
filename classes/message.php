<?php

  /**
   *
   */
  class message
  {
    private $subject;
    private $text;

    function setSubject($subject)
    {
      $subject = trim($subject);
      
      if (strlen($subject) <= 32)
      {
        $this->subject = ucfirst($subject);
      }
    }

    function getSubject()
    {
      return $this->subject;
    }

    function setMessage($text)
    {
      $this->text = $text;
    }

    function getMessage()
    {
      return $this->text;
    }

  }


 ?>
