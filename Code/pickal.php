<?php
session_start();
try {
$mongodb = new Mongo();
$articleCollection = $mongodb->pickup->articles;
} catch (MongoConnectionException $e) {
die('Failed to connect to MongoDB '.$e->getMessage());
}
$currentPage = (isset($_GET['page'])) ? (int) $_GET['page']: 1;
$articlesPerPage = 5;
$skip = ($currentPage - 1) * $articlesPerPage;
$cursor = $articleCollection->find();
$totalArticles = $cursor->count();
$totalPages = (int) ceil($totalArticles / $articlesPerPage);
$cursor->sort(array('saved_at'=>-1))->skip($skip)->limit($articlesPerPage);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="style.css" />
<title>Welcome </title>
<link rel="stylesheet" href="css/nav.css">
<style>
div#contentarea { width : 650px; }
div#navigation {
margin: 0px 150px;
padding: 5px 90px;
text-align:center;
}
div#navigation div.prev { display:block; float:left; width:40%; }
div#navigation div.page-number { float:left; width:20%; }
div#navigation div.next { float:right; width:40%; }
.clear { clear: both; }
.TFtable{
		width:100%; 
		border-collapse:collapse; 
	}
	.TFtable td{ 
		padding:7px; border:#4e95f4 1px solid;
	}
	/* provide some minimal visual accomodation for IE8 and below */
	.TFtable tr{
		background: #b8d1f3;
	}
	/*  Define the background color for all the ODD background rows  */
	.TFtable tr:nth-child(odd){ 
		background: #b8d1f3;
	}
	/*  Define the background color for all the EVEN background rows  */
	.TFtable tr:nth-child(even){
		background: #dae5f4;
	}
</style>
</head>
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
	<a style="float:right;" href="profile.php"><br><br><br><br><br><font color="white" >back</font></br></br></br></br></br></a>
	</div>
		 <div id="content">
		 <fieldset>
        <legend>Register Form</legend>
<table class="TFtable">
<thead>
   <tr>
      <th width="55%">First name</th>
      <th width="27%">Requested at</th>
      <th width="*">Details</th>
   </tr>
 </thead>
<tbody>
<?php while($cursor->hasNext()):$article = $cursor->getNext();?>
<tr>
<td>
<?php if($article['first_name']===$_SESSION['SESS_FNAME']) { ?>
<?php echo $article['first_name'];?>
</td>
<td>
<?php print date('g:i a, F j',$article['saved_at']->sec);
?>
</td>
 <td class="url">
 <a href="details.php?id=<?php echo $article['_id']; ?> " >View
</a>
</td>
</tr>
<?php } ?>
<?php endwhile;?>
</tbody>
</table>
</fieldset>
</div>
<div id="navigation">
<div class="prev">
<?php if($currentPage !== 1): ?>
<a href="<?php echo $_SERVER['PHP_SELF'].'?page='.($currentPage - 1);
?>">Previous </a>
<?php endif; ?>
</div>
<div class="page-number">
<?php echo $currentPage; ?>
</div>
<div class="next">
<?php if($currentPage !== $totalPages): ?>
<a href="<?php echo $_SERVER['PHP_SELF'].'?page='.($currentPage + 1);
?>">Next</a>
<?php endif; ?>
</div>
<br class="clear"/>
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
