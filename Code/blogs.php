<?php
 try {
 $connection = new Mongo();
 $database = $connection->selectDB('ePostOffice');
 $collection = $database->selectCollection('users');
 } catch(MongoConnectionException $e) {
 die("Failed to connect to database ".$e->getMessage());
 }
 $cursor = $collection->find();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" 
 lang="en">
 <head>
 <meta http-equiv="Content-Type" content="text/html; 
 charset=utf-8"/>
 <link rel="stylesheet" href="style.css" />
 <title>My Blog Site</title>
 </head>
 <body>
 <div id="contentarea">
 <div id="innercontentarea">
 <h1>My Blogs</h1>
 <?php while ($cursor->hasNext()):$article = $cursor->getNext(); ?>
 <h2><?php echo $article['username'];echo $article['first_name']?></h2>
 <?php echo $collection->find(array('username'=>'yamini' ));?>
 <a href="blog.php?id=<?php echo $article['_id']; 
 ?>">Read more</a>
 <?php endwhile; ?>
 </div>
 </div>
 </body>
</html>