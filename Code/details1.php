<?php
$id = $_GET['id'];
try {
$connection = new Mongo();
$database = $connection->selectDB('pickup');
$collection = $database->selectCollection('articles');
} catch(MongoConnectionException $e) {
die("Failed to connect to database ".$e->getMessage());
}
$article = $collection->findOne(array('_id' =>
new MongoId($id)));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"
lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;
charset=utf-8"/>
<link rel="stylesheet" href="style.css" />
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
	<a style="float:right;" href="pickal1.php"><br><br><br><br><br><font color="white" >back to pickup display</font></br></br></br></br></br></a>
	</div>
	<div id="content">
	<fieldset>



<div>
			<?php
			    if(isset($article['first_name']) || (trim($article['first_name']) != ''))
				  {
				   echo '<font size="+1"><B>First Name&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$article['first_name'];
				  }
				?>
		    </div>
			<div>
			<?php
			    if(isset($article['email']) || (trim($article['email']) != ''))
				  {
                echo '<font size="+1"><B>Email id&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$article['email'];
				  }
				?>
		    </div>
			<div>
			<?php
			    if(isset($article['product']) || (trim($article['product']) != ''))
				  {
                   echo '<font size="+1"><B>Product Type&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$article['product'];
				  }
				?>
		    </div>
			<div>
			<?php
			    if(isset($article['phone']) || (trim($article['phone']) != ''))
				  {
                   echo '<font size="+1"><B>Phone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$article['phone'];
				  }
				  
				?>
		    </div>	
			<h3>Address</h3>
      <div>
		<?php
			    if(isset($article['address']['street']) || (trim($article['address']['street'] != '')))
				  {
                   echo '&nbsp;&nbsp;&nbsp;&nbsp;<font size="+1"><B>Street&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$article['address']['street'];
				  }
				  
				?>
	   </div>
	   <div>
        
		       <?php
			    if(isset($article['address']['city']) || (trim($article['address']['city']!= '')))
				  {
                   echo '&nbsp;&nbsp;&nbsp;&nbsp;<font size="+1"><B>City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$article['address']['city'];;
				  }
				  
				?>
      </div>
	  <div>
		
		<?php
			    if(isset($article['address']['state']) || (trim($article['address']['state'] != '')))
				  {
                   echo '&nbsp;&nbsp;&nbsp;&nbsp;<font size="+1"><B>State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$article['address']['state'];
				  }
				  
				?>
       </div>
	   <div>
		
		<?php
			    if(isset($article['address']['pin_code']) || (trim($article['address']['pin_code'] != '')))
				  {
                   echo '&nbsp;&nbsp;&nbsp;&nbsp;<font size="+1"><B>Pincode&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$article['address']['pin_code'];
				  }
				 
				?>
      </div>
	  <div>
		<?php
			    if(isset($article['address']['country']) || (trim($article['address']['country'] != '')))
				  {
                   '&nbsp;&nbsp;&nbsp;&nbsp;<font size="+1"><B>Country&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</B></font>'.$article['address']['country'];
				  }
				 
				?>  
      </div>
			
			

            </fieldset>
</div>
</div>

</body>
</html>