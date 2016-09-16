<?php
		require_once('auth.php');
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
            	<li><a href="#" title="Postal services">Postal services</a>
				     <ul>
					     <li><a href="emo.php" title="Electronic Money Order">eMO</a></li>
						 <li><a href="info.php" title="Introformation">INFORMATION</a></li>
					 </ul>
				
				</li>
          		<li><a href="Philately.php" title="Philately">Philately</a>       
                </li>
              <li><a href="#" title="Address Book">Address Book</a>
			      <ul>
                    	<li><a href="user_dis.php" title="display address">display</a></li>
                        <li><a href="user_update.php" title="add new address">add</a></li>
						<li><a href="user_edit.php" title="update address">update</a></li>
						<li><a href="user_searchspec.php" title="update new address">searchspec</a></li>
                  </ul>        
			  </li>
              <li><a href="#" title="Pickup">Pickup</a>
			      <ul>
				      <li><a href="pickup.php" title="Pickup">Pickup</a></li>
					  <li><a href="pickal.php" title="Pickup">display</a></li>
				  </ul>
	          </li>
              <li class="last"><a href="help.html" title="Help">Help</a></li>
          </ul>
        </nav>
		 <div id="content">
		 <h1><font color="#4CD4CB">&nbsp;&nbsp;India post on your Computer</h1></font>
		 <p>&nbsp;&nbsp;&nbsp;&nbsp;In the recent past, Internet and e-mail have revolutionized the world of communications. At the same time,post offices useage is diminishing gradually. Inorder to increase the usage of post office and to make this use easy to access,We are introducing ePOST service.</p>

<p>&nbsp;&nbsp;&nbsp;&nbsp;Through ePOST,one can use most of the functions in normal post office.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;Apart from the normal e-Services this also offer the PICKUP order for packages over the internet.</p> <p>&nbsp;&nbsp;&nbsp;&nbsp;Other Feature is in the case of the absence or the move, one can let delegate here the after shipment of the postal service at another address or store the letter shipments.  The customers can register themselves and can be served individually.</p>

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
	</body>
</html>
</div>
</body>
</html>
