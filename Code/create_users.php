<?php

 require('dbconnection.php');

 $mongo = DBConnection::instantiate();

 $collection = $mongo->getCollection('users');

 $users = array(

 array( 

 'name' => 'yamini',

 'username' => 'yamini',

 'password' => md5('yamini'),

 'birthday' => new MongoDate(

 strtotime('1971-09-29 00:00:00')),

 'address' => array(

 'town' => 'vizag',

 'city' => 'madhurawada'

 )

 ),

 array( 

 'name' => 'venkatesh',

 'username' => 'venkatesh',

 'password' => md5('venkatesh'),

 'birthday' => new MongoDate

 (strtotime('1976-10-21 00:00:00')),

 'address' => array(

 'town' => 'eluru',

 'city' => 'N.R peta'

 )

 ),

 array( 

 'name' => 'suryam',

 'username' => 'suryam',

 'password' => md5('suryam'),

 'birthday' => new MongoDate

 (strtotime('1974-05-19 00:00:00')),

 'address1' => array(

 'town' => 'srikakulam',
 
 'city' => 'srikakulam'

 )

 )

 );

 

 foreach($users as $user)

 {

 try{

 $collection->insert($user);

 } catch (MongoCursorException $e) {

 die($e->getMessage());

 }

 }

 echo 'Users created successfully';