<?php
  class NusClient {
    public $apiAddress;
    function __construct($apiLink){
      $this->apiAddress = $apiLink;
    }

    function curlGet($path,$header){
      $ch = curl_init();
      curl_setopt($ch,CURLOPT_URL,$this->apiAddress . $path);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
      $out = curl_exec($ch);
      curl_close($ch);
      return $out;
    }

    function curlPost($path,$header,$body){
      $ch = curl_init();
      foreach($body as $key=>$value) { $fieldsString .= urlencode($key).'='.urlencode($value).'&'; }
      $fieldsString = rtrim($fieldsString, '&');
      curl_setopt($ch,CURLOPT_URL, $this->apiAddress . $path);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
      curl_setopt($ch,CURLOPT_POST, count($body));
      curl_setopt($ch,CURLOPT_POSTFIELDS, $fieldsString);

      $out = curl_exec($ch);
      curl_close($ch);
      return $out;
    }

    function curlPut($path,$header,$body){
      $ch = curl_init($this->apiAddress . $path);
      curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
      curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($body));
      $out = curl_exec($ch);
      curl_close($ch);
      return $out;
    }

    function authorizeToken($username,$token){
      $result = $this->curlGet("/users/" . $username . "/tokens",array("TokenBody: $token"));
      $result = json_decode($result,true);
      return $result;
    }

    function authorizeUser($username,$password){
      $result = $this->curlPost("/users/" . $username . "/tokens",array(),array("password"=>$password));
      $result = json_decode($result,true);
      return $result;
    }

    function getAllUsers($username,$token){
      $result = $this->curlGet("/users",array("TokenUsername: $username","TokenBody: $token"));
      $result = json_decode($result,true);
      return $result;
    }

    function getAllTokens($username,$token){
      $result = $this->curlGet("/tokens",array("TokenUsername: $username","TokenBody: $token"));
      $result = json_decode($result,true);
      return $result;
    }

    function createUser($username,$password,$email,$group,$tokenUsername,$token){
      $result = $this->curlPost("/users",array("TokenUsername: $tokenUsername","TokenBody: $token"),array("username"=>$username,"password"=>$password,"email"=>$email,"group"=>$group));
      $result = json_decode($result,true);
      return $result;
    }

    function updateUsername($username,$token,$oldUsername,$newUsername){
      $result = $this->curlPut("/users/" . $oldUsername . "/username",array("TokenUsername: $username","TokenBody: $token"),array("username"=>$newUsername));
      $result = json_decode($result,true);
      return $result;
    }

    function updatePassword($username,$token,$targetUsername,$password){
      $result = $this->curlPut("/users/" . $targetUsername . "/password",array("TokenUsername: $username","TokenBody: $token"),array("password"=>$password));
      $result = json_decode($result,true);
      return $result;
    }

    function updateEmail($username,$token,$targetUsername,$email){
      $result = $this->curlPut("/users/" . $targetUsername . "/email",array("TokenUsername: $username","TokenBody: $token"),array("email"=>$email));
      $result = json_decode($result,true);
      return $result;
    }

    function updateGroup($username,$token,$targetUsername,$group){
      $result = $this->curlPut("/users/" . $targetUsername . "/group",array("TokenUsername: $username","TokenBody: $token"),array("group"=>$group));
      $result = json_decode($result,true);
      return $result;
    }
  }
?>
