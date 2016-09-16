<?php
//Start session
    session_start();
	
   try
    {
	$err=false;
      require('dbconnection.php');
      $mongo = DBConnection::instantiate();
      $collection = $mongo->getCollection('users');
	  
	  $cursor = $collection->find();
	  $err=true;
	   // iterate through the result set
       // print each document    
	}catch(MongoConnectionException $e) {
die("Failed to connect to database ". $e->getMessage());
}
?>
 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 

 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="style1.css"/>
<title>registration page</title>
</head>

<style type="text/css">
    #wrapper {
        width:450px;
        margin:0 auto;
        font-family:Verdana, sans-serif;
    }
    legend {
        color:#0481b1;
        font-size:16px;
        padding:0 10px;
        background:#fff;
        -moz-border-radius:4px;
        box-shadow: 0 1px 5px rgba(4, 129, 177, 0.5);
        padding:5px 10px;
        text-transform:uppercase;
        font-family:Helvetica, sans-serif;
        font-weight:bold;
    }
    fieldset {
        border-radius:4px;
        background: #fff; 
        background: -moz-linear-gradient(#fff, #f9fdff);
        background: -o-linear-gradient(#fff, #f9fdff);
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fff), to(#f9fdff)); /
        background: -webkit-linear-gradient(#fff, #f9fdff);
        padding:20px;
        border-color:rgba(4, 129, 177, 0.4);
    }
    input,
    textarea {
        color: #373737;
        background: #fff;
        border: 1px solid #CCCCCC;
        color: #aaa;
        font-size: 14px;
        line-height: 1.2em;
        margin-bottom:15px;

        -moz-border-radius:4px;
        -webkit-border-radius:4px;
        border-radius:4px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset, 0 1px 0 rgba(255, 255, 255, 0.2);
    }
    input[type="text"],
    input[type="password"]{
        padding: 8px 6px;
        height: 22px;
        width:280px;
    }
    input[type="text"]:focus,
    input[type="password"]:focus {
        background:#f5fcfe;
        text-indent: 0;
        z-index: 1;
        color: #373737;
        -webkit-transition-duration: 400ms;
        -webkit-transition-property: width, background;
        -webkit-transition-timing-function: ease;
        -moz-transition-duration: 400ms;
        -moz-transition-property: width, background;
        -moz-transition-timing-function: ease;
        -o-transition-duration: 400ms;
        -o-transition-property: width, background;
        -o-transition-timing-function: ease;
        width: 380px;
        
        border-color:#ccc;
        box-shadow:0 0 5px rgba(4, 129, 177, 0.5);
        opacity:0.6;
    }
    input[type="submit"]{
        background: #222;
        border: none;
        text-shadow: 0 -1px 0 rgba(0,0,0,0.3);
        text-transform:uppercase;
        color: #eee;
        cursor: pointer;
        font-size: 15px;
        margin: 5px 0;
        padding: 5px 22px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-border-radius:4px;
        -webkit-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
    }
    textarea {
        padding:3px;
        width:96%;
        height:100px;
    }
    textarea:focus {
        background:#ebf8fd;
        text-indent: 0;
        z-index: 1;
        color: #373737;
        opacity:0.6;
        box-shadow:0 0 5px rgba(4, 129, 177, 0.5);
        border-color:#ccc;
    }
    .small {
        line-height:14px;
        font-size:12px;
        color:#999898;
        margin-bottom:3px;
    }
	.slimField {
        width: 80px;
      }
      .wideField {
        width: 200px;
      }
</style>
<body id="body-color">
<div id="wrap">
	<div id="header">
	<a style="float:right;" href="logout.php"><br><br><br><br><br><font color="white" ></font></br></br></br></br></br></a>
	</div>
	<div id="content">
	<?php
	
	echo $cursor->count() . ' document(s) found. <br/>';  
	echo '<br/>';
	echo '<br/>';
         foreach ($cursor as $obj) {
		 if (isset($obj['first_name']) && ($obj['first_name']!='') ) {
		 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'First Name: ' . $obj['first_name'] . '<br/>';
		 }
		 if (isset($obj['last_name']) && ($obj['last_name'])!='') {
		 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
          echo 'Last Name: ' . $obj['last_name'] . '<br/>';
		  }
		  if (isset($obj['email']) && ($obj['email']!='')) {
		  echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
          echo 'Email id: ' . $obj['email'] . '<br/>';
		  }
		  if (isset($obj['phone']) && ($obj['phone']!='')) {
		  echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		  echo 'Phone Number: ' . $obj['phone'] . '<br/>';
		  }
		  if (isset($obj['birthday']) && ($obj['phone']!='')) {
		  echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		  echo 'Birthday: ' . $obj['birthday'] . '<br/>';
		  }
		 if (isset($obj['address']['street']) && ($obj['address']['street']!='')) {
		 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'Street: ' . $obj['address']['street'] . '<br/>';
		 }
		if (isset($obj['address']['city']) && ($obj['address']['city']!='')) {
		echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'City: ' . $obj['address']['city'] . '<br/>';
		 }
		 if (isset($obj['address']['state']) && ($obj['address']['state']!='')) {
		 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'State: ' . $obj['address']['state'] . '<br/>';
		 }
		 if (isset($obj['address']['pin_code']) && ($obj['address']['pin_code']!='')) {
		 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'Pin code: ' . $obj['address']['pin_code'] . '<br/>';
		 }
		 if (isset($obj['address']['country']) && ($obj['address']['country']!='') ){
		 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'Country: ' . $obj['address']['country'] . '<br/>';
		 }
         echo '<br/>';
		 }
	
	?>

</div>
</div>
</body>
</html>