<?php
  class DatabaseConnection{
    public $mysqliObject;
    function __construct($host,$username,$password,$database){
      $this->mysqliObject = new mysqli($host,$username,$password,$database);
      if($this->mysqliObject->errno){
        echo "Failed to connect to database";
        exit;
      }
    }
  }

  //Get client's IP address
  function getIp()
  {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }

  //Get client identifier
  function getClientIdentifier(){
    $ipAddress = getIp();
    if(!$ipAddress){
      return false;
    } else {
      return $ipAddress . "-" . md5($_SERVER['HTTP_USER_AGENT']);
    }
  }
?>
