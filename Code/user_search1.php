<?php
		require_once('auth.php');	
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
<link rel="stylesheet" href="style.css" />
<title>Welcome </title>
<link rel="stylesheet" href="css/nav.css">
</head>
<body class="no-js">
    	<script>
			var el = document.getElementsByTagName("body")[0];
			el.className = "";
		</script>
        <noscript>
        </noscript>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>ePOST OFFICE</title>
	<link rel="stylesheet" href="style1.css" />
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
</head>
<body>
<div id="wrap">
	<div id="header">
	<a style="float:right;" href="logout.php"><br><br><br><br><br><font color="white" >Log out</font></br></br></br></br></br></a>
	</div>
	<nav id="topNav">
        	<ul>
            	<li><a href="user_search1.php" title="Address">Addresses</a>
				</li>
          		<li><a href="pickal1.php" title="Pickup">Phickup service</a>       
                </li>
				</li>
				<li><a href="email.php" title="email">Email</a>       
                </li>
          </ul>
        </nav>
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
		 if (isset($obj['address2']['street']) && ($obj['address2']['street']!='')) {
		 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'Street: ' . $obj['address2']['street'] . '<br/>';
		 }
		 else
		 {
		   if (isset($obj['address']['street']) && ($obj['address']['street']!='')) {
		 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'Street: ' . $obj['address']['street'] . '<br/>';
		 }
		 }
		if (isset($obj['address2']['city']) && ($obj['address2']['city']!='')) {
		echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'City: ' . $obj['address2']['city'] . '<br/>';
		 }else
		 {
		   echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'City: ' . $obj['address']['city'] . '<br/>';
		 }
		 if (isset($obj['address2']['state']) && ($obj['address2']['state']!='')) {
		 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'State: ' . $obj['address2']['state'] . '<br/>';
		 }
		 else
		 {
		  echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'State: ' . $obj['address']['state'] . '<br/>';
		 }
		 if (isset($obj['address2']['pin_code']) && ($obj['address2']['pin_code']!='')) {
		 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'Pin code: ' . $obj['address2']['pin_code'] . '<br/>';
		 }
		 else
		 {
		   echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'Pin code: ' . $obj['address']['pin_code'] . '<br/>';
		 }
		 if (isset($obj['address2']['country']) && ($obj['address2']['country']!='') ){
		 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'Country: ' . $obj['address2']['country'] . '<br/>';
		 }
		 else
		 {
		  echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'Country: ' . $obj['address']['country'] . '<br/>';
		 }
         echo '<br/>';
		 }
	
	?>
		</div>
		<script src="js/jquery.js"></script>
        <script src="js/modernizr.js"></script>
		<script>
			(function($){
				
				//cache nav
				var nav = $("#topNav");
				
				//add indicator and hovers to submenu parents
				nav.find("li").each(function() {
					if ($(this).find("ul").length > 0) {
						$("<span>").text("^").appendTo($(this).children(":first"));

						//show subnav on hover
						$(this).mouseenter(function() {
							$(this).find("ul").stop(true, true).slideDown();
						});
						
						//hide submenus on exit
						$(this).mouseleave(function() {
							$(this).find("ul").stop(true, true).slideUp();
						});
					}
				});
			})(jQuery);
			
		</script>
</html>
</div>
</body>
</html>
