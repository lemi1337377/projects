<?php

class SignupContr
{
    private $uid;
    private $pwd;
    private $pwdrpt;
    private $email;

    public function __construct($uid, $pwd, $pwdrpt, $email)
    {
        $this->uid = $uid; //no $ for properties
        $this->pwd = $pwd;
        $this->pwdrpt = $pwdrpt;
        $this->email = $email;
    }

    private function emptyInput()
    {
      empty($this->uid||$this->pwd||$this->pwdrpt||$this->email) ? true : false; 
    }
    private function invalidInput()
    { 
      preg_match("/^[a-zA-Z0-9]*$/",$this->uid)? true : false; 
    }

    private function invalidEmail()
    {
      filter_var($this->email, FILTER_VALIDATE_EMAIL) ? true : false;
    }

    private function pwdMatch(){
        $this->pwd == $this->pwdrpt ? true : false;
    }
}