<?php
 session_start();
 require_once('dbconnection.php');

 class User

 {

 const COLLECTION = 'users';

 private $_mongo;

 private $_collection;

 private $_user;

 public function __construct()

 {

 $this->_mongo = DBConnection::instantiate();

 $this->_collection = $this->_mongo->

 getCollection(User::COLLECTION);

 }

 public function authenticate($username, $password)
 
 {

 $query = array(

 'username' => $username,

 'password' => md5($password)

 );

 $this->_user = $this->_collection->findOne($query);

 if (empty($this->_user)) return False;
   $_SESSION['SESS_FNAME']=$this->_user['first_name'];
   $_SESSION['SESS_LNAME']=$this->_user['last_name'];
   $_SESSION['SESS_EMAIL']=$this->_user['email'];
   $_SESSION['SESS_PHONE']=$this->_user['phone'];
   $_SESSION['SESS_USERNAME']=$this->_user['username'];
   $_SESSION['SESS_PASSWORD']=$this->_user['password'];
   $_SESSION['SESS_BDAY']=$this->_user['birthday'];
   $_SESSION['SESS_STREETNAME']=$this->_user['address']['street'];
   $_SESSION['SESS_CITY']=$this->_user['address']['city'];
   $_SESSION['SESS_STATE']=$this->_user['address']['state'];
   $_SESSION['SESS_PCODE']=$this->_user['address']['pin_code'];
   $_SESSION['SESS_COUNTRY']=$this->_user['address']['country'];
   
   session_write_close();   

 return True;

 }

 }