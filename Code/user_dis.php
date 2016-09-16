<?php
//Start session
    session_start();
	
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
	<a style="float:right;" href="profile.php"><br><br><br><br><br><font color="white" >back</font></br></br></br></br></br></a>
	</div>
	<div id="content">
	<fieldset>
            <div>
			<?php
			    if(isset($_SESSION['SESS_USERNAME']) || (trim($_SESSION['SESS_USERNAME']) != ''))
				  {
				   echo '<font size="+1"><B>Username&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$_SESSION['SESS_USERNAME'];
				  }
				?>
		    </div>
			<div>
			<?php
			    if(isset($_SESSION['SESS_FNAME']) || (trim($_SESSION['SESS_FNAME']) != ''))
				  {
                echo '<font size="+1"><B>First name&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$_SESSION['SESS_FNAME'];
				  }
				?>
		    </div>
			<div>
			<?php
			    if(isset($_SESSION['SESS_LNAME']) || (trim($_SESSION['SESS_LNAME']) != ''))
				  {
                   echo '<font size="+1"><B>Last name&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$_SESSION['SESS_LNAME'];
				  }
				?>
		    </div>
			<div>
			<?php
			    if(isset($_SESSION['SESS_EMAIL']) || (trim($_SESSION['SESS_EMAIL']) != ''))
				  {
                   echo '<font size="+1"><B>Email id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$_SESSION['SESS_EMAIL'];
				  }
				  
				?>
		    </div>
			<div>
			<?php
			    if(isset($_SESSION['SESS_PHONE']) || (trim($_SESSION['SESS_PHONE']) != ''))
				  {
                   echo '<font size="+1"><B>Telephone&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$_SESSION['SESS_PHONE'];
				  }

				?>
		    </div>		
			<h3>Address</h3>
      <div>
		<?php
			    if(isset($_SESSION['SESS_STREETNAME']) || (trim($_SESSION['SESS_STREETNAME'] != '')))
				  {
                   echo '&nbsp;&nbsp;&nbsp;&nbsp;<font size="+1"><B>Street&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$_SESSION['SESS_STREETNAME'];
				  }
				  
				?>
	   </div>
	   <div>
        
		       <?php
			    if(isset($_SESSION['SESS_CITY']) || (trim($_SESSION['SESS_CITY'] != '')))
				  {
                   echo '&nbsp;&nbsp;&nbsp;&nbsp;<font size="+1"><B>City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$_SESSION['SESS_CITY'];
				  }
				  
				?>
      </div>
	  <div>
		
		<?php
			    if(isset($_SESSION['SESS_STATE']) || (trim($_SESSION['SESS_STATE'] != '')))
				  {
                   echo '&nbsp;&nbsp;&nbsp;&nbsp;<font size="+1"><B>State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$_SESSION['SESS_STATE'];
				  }
				  
				?>
       </div>
	   <div>
		
		<?php
			    if(isset($_SESSION['SESS_PCODE']) || (trim($_SESSION['SESS_PCODE'] != '')))
				  {
                   echo '&nbsp;&nbsp;&nbsp;&nbsp;<font size="+1"><B>Pincode&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$_SESSION['SESS_PCODE'];
				  }
				 
				?>
      </div>
	  <div>
		<?php
			    if(isset($_SESSION['SESS_COUNTRY']) || (trim($_SESSION['SESS_COUNTRY'] != '')))
				  {
                   '&nbsp;&nbsp;&nbsp;&nbsp;<font size="+1"><B>Country&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$_SESSION['SESS_COUNTRY'];
				  }
				 
				?>  
      </div>
			
			

            </fieldset>

</div>
</div>
</body>
</html>