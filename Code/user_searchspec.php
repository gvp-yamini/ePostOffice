
<?php
//Start session
    session_start();
	$err=false;
	if(!empty($_POST['search']) && ($_POST['search'] === 'search' ))
	{
      $fname=strip_tags($_POST['first_name']);
	  $_SESSION['sessionVar1'] = $fname;
      $email=strip_tags($_POST['email']);
	  $_SESSION['sessionVar2'] = $email;
      $phone=strip_tags($_POST['phone']);
	  $_SESSION['sessionVar5'] = $city;
      $state=strip_tags($_POST['state']);
	  $_SESSION['sessionVar6'] = $state;
      $pin_code=strip_tags($_POST['pincode']);
	  $_SESSION['sessionVar7'] = $pin_code;
      $country=strip_tags($_POST['country']);
	  $_SESSION['sessionVar8'] = $country;
	  $err=true;
	 if($err)
      {
       header("Location:results.php");
      }
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
	<a style="float:right;" href="profile.php"><br><br><br><br><br><font color="white" >back</font></br></br></br></br></br></a>
	</div>
	<div id="content">
	<font color="red"> fill more than one field for accurate result and First is compulsory </font> 
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<div id="tfheader">
		<div id="tfnewsearch">
		 First Name
		        <input type="text" class="tftextinput" placeholder="First name" required pattern="[a-zA-z]{1,30}" name="first_name" size="21" maxlength="120">
		</div>
	<div class="tfclear"></div>
	
	</div>
		<div id="tfheader">
		<div id="tfnewsearch">
		Email id &nbsp;&nbsp;&nbsp;
		        <input type="text" class="tftextinput" placeholder="Email id"  name="email" size="21" maxlength="120">
		</div>
	<div class="tfclear"></div>
	</div>	
	<div id="tfheader">
		<div id="tfnewsearch">
		 City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		        <input type="text" class="tftextinput" placeholder="City" name="city" size="21" maxlength="120">
		</div>
	<div class="tfclear"></div>
	</div>
	<div id="tfheader">
		<div id="tfnewsearch">
		 State &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		        <input type="text" class="tftextinput" placeholder="State" name="state" size="21" maxlength="120">
		</div>
	<div class="tfclear"></div>
	</div>
	<div id="tfheader">
		<div id="tfnewsearch">
		 Pincode &nbsp;&nbsp;&nbsp;&nbsp;
		        <input type="text" class="tftextinput" placeholder="pincode" name="pincode" size="21" maxlength="120">
		</div>
	<div class="tfclear"></div>
	</div>
	<div id="tfheader">
		<div id="tfnewsearch">
		 Country &nbsp;&nbsp;&nbsp;&nbsp;
		        <input type="text" class="tftextinput" placeholder="country" name="country" size="21" maxlength="120">
		</div>
	<div class="tfclear"></div>
	</div>
	
	
	<input type="submit" name="search" value="search" class="tfbutton">
	</form>
</div>
</div>
</body>
</html>