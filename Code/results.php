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
<title>search address</title>
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
	  
	#tfheader{
		background-color:#c3dfef;
	}
	#tfnewsearch{
		padding:20px;
	}
	.tftextinput{
		margin: 0;
		padding: 5px 15px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		border:1px solid #0076a3; border-right:0px;
		border-top-left-radius: 5px 5px;
		border-bottom-left-radius: 5px 5px;
	}
	.tfbutton {
		margin: 0;
		padding: 5px 15px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		outline: none;
		cursor: pointer;
		text-align: center;
		text-decoration: none;
		color: #ffffff;
		border: solid 1px #0076a3; border-right:0px;
		background: #0095cd;
		background: -webkit-gradient(linear, left top, left bottom, from(#00adee), to(#0078a5));
		background: -moz-linear-gradient(top,  #00adee,  #0078a5);
		border-top-right-radius: 5px 5px;
		border-bottom-right-radius: 5px 5px;
	}
	.tfbutton:hover {
		text-decoration: none;
		background: #007ead;
		background: -webkit-gradient(linear, left top, left bottom, from(#0095cc), to(#00678e));
		background: -moz-linear-gradient(top,  #0095cc,  #00678e);
	}
	/* Fixes submit button height problem in Firefox */
	.tfbutton::-moz-focus-inner {
	  border: 0;
	}
	.tfclear{
		clear:both;
	}
</style>
<body id="body-color">
<div id="wrap">
	<div id="header">
	<a style="float:right;" href="user_searchspec.php"><br><br><br><br><br><font color="white" >back</font></br></br></br></br></br></a>
	</div>
	<div id="content">
		<?php
		$count=0;
    while($cursor->hasNext()):$article = $cursor->getNext();	
	     if((($article['first_name']===$_SESSION['sessionVar1'])&&isset($_SESSION['sessionVar1']) &&($_SESSION['sessionVar1']!='')) || 
		 (($_SESSION['sessionVar2'] === $article['email'])&&isset($_SESSION['sessionVar2']) &&($_SESSION['sessionVar2']!='')) || 
		 (($_SESSION['sessionVar5'] === $article['address']['city'] )&&isset($_SESSION['sessionVar5']) &&($_SESSION['sessionVar5']!='')) ||
		 (($_SESSION['sessionVar6'] === $article['address']['state'])&&isset($_SESSION['sessionVar6']) &&($_SESSION['sessionVar6']!='')) ||
		 (($_SESSION['sessionVar7'] ===$article['address']['pin_code'])&&isset($_SESSION['sessionVar7']) &&($_SESSION['sessionVar7']!='')) ||
		 (($_SESSION['sessionVar8'] === $article['address']['country'])&&isset($_SESSION['sessionVar8']) &&($_SESSION['sessionVar8']!=''))){
		 if (isset($article['first_name']) && ($article['first_name']!='') ) {
		 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'First Name: ' . $article['first_name'] . '<br/>';
		 $count=1;
		 }
		 if (isset($article['last_name']) && ($article['last_name'])!='') {
		 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
          echo 'Last Name: ' . $article['last_name'] . '<br/>';
		  }
		  if (isset($article['email']) && ($article['email']!='')) {
		  echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
          echo 'Email id: ' . $article['email'] . '<br/>';
		  $count=1;
		  }
		  if (isset($article['phone']) && ($article['phone']!='')) {
		  echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		  echo 'Phone Number: ' . $article['phone'] . '<br/>';
		  $count=1;
		  }
		  if (isset($article['birthday']) && ($article['phone']!='')) {
		  echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		  echo 'Birthday: ' . $article['birthday'] . '<br/>';
		  $count=1;
		  }
		 if (isset($article['address2']['street']) && ($article['address2']['street']!='')) {
		 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'Street: ' . $article['address2']['street'] . '<br/>';
		 $count=1;
		 }
		if (isset($article['address2']['city']) && ($article['address2']['city']!='')) {
		echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'City: ' . $article['address2']['city'] . '<br/>';
		 $count=1;
		 }
		 else
		 {
		   echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'City: ' . $article['address']['city'] . '<br/>';
		 $count=1;
		 }
		 if (isset($article['address2']['state']) && ($article['address2']['state']!='')) {
		 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'State: ' . $article['address2']['state'] . '<br/>';
		 $count=1;
		 }else
		 {
		    echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'State: ' . $article['address']['state'] . '<br/>';
		 $count=1;
		 }
		 if (isset($article['address2']['pin_code']) && ($article['address2']['pin_code']!='')) {
		 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'Pin code: ' . $article['address2']['pin_code'] . '<br/>';
		 $count=1;
		 }
		 else
		 {
		     echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'Pin code: ' . $article['address']['pin_code'] . '<br/>';
		 $count=1;
		 }
		 if (isset($article['address2']['country']) && ($article['address2']['country']!='') ){
		 echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'Country: ' . $article['address2']['country'] . '<br/>';
		 $count=1;
		 }
		 else
		 {
		    echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		 echo 'Country: ' . $article['address']['country'] . '<br/>';
		 $count=1;
		 }
         echo '<br/>';
		 }
		 endwhile;
		 if($count !=1)
		  {
		  echo '<h1>user not found</h1>';
		  }
	
	?>
	</div>
	</div>
	</body>
	</html>
	