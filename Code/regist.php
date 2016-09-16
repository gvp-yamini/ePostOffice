<?php
$action = (!empty($_POST['registration']) && ($_POST['registration'] === 'register' )) ? 'save_article' : 'show_form';
switch($action) {
case 'save_article':
 $fname=strip_tags($_POST['first_name']);
 $lname=strip_tags($_POST['last_name']);
 $username=strip_tags($_POST['username']);
 $password=strip_tags($_POST['pass']);
 $email=strip_tags($_POST['email']);
 $telephone=strip_tags($_POST['usrtel']);
 $street=strip_tags($_POST['street']);
 $city=strip_tags($_POST['city']);
 $state=strip_tags($_POST['state']);
 $pin_code=strip_tags($_POST['pin_code']);
 $country=strip_tags($_POST['country']);
 $error=array();
  if(empty($email) or !filter_var($email,FILTER_SANITIZE_EMAIL))
        {
          $error[] = "Email id is empty or invalid";
        }
		if(empty($username))
		{
		 $error[]="please enter username";
		}
		if(empty($fname))
		{
		$error[]="please enter first name";
		}
        if(empty($password)){
          $error[] = "Please enter password";
        }
		if(strlen($password)<6){
                $error[]= "error: password must be atleast 6 characters";
				}
		
		if(count($error) ==0){
try
 {
  $err=false;
 require('dbconnection.php');
 $mongo = DBConnection::instantiate();
$collection = $mongo->getCollection('users');

$query=array('username'=>$username);
$count=$collection->findOne($query);

if(!count($count)){
$user = array(
'first_name' => $fname,
'last_name'=>$lname,
'email' => $email,
'phone' => $telephone, 
'username' => $username,
'password' => md5($password),
'address' => array(
 'street' => $street,
 'city' => $city,
 'state'=>$state,
 'pin_code'=>$pin_code,
 'country'=>$country
 )
);
  $collection->insert($user);
   $err=true;
  echo "you are successfully registered.";
  }else
  {
  echo "username is already existed.Please register with another username.";
  } 
} catch(MongoConnectionException $e) {
die("Failed to connect to database ". $e->getMessage());
}
}
if($err)
{
header("Location: login.php");
}
break;
case 'show_form':
default:
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
<?php if ($action === 'show_form'): ?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            
	<fieldset>
        <legend>Register Form</legend>
            <div>
                <input type="text" name="first_name" placeholder="First Name" required pattern="[a-zA-z]{1,30}" /><font color="red" face="tahoma">&nbsp;&nbsp;&nbsp;fill with alphabets only</font> 
				<font color="red" face="tahoma"><?php if(isset($_POST['registration'])){ if($fname == "" ) {
                 $error1= "error : You did not enter a first name.";
                 echo $error1;
                 } }?></font>
				
            </div>
            <div>
                <input type="text" name="last_name" placeholder="Last Name"/>
            </div>
			<div>
			     <input type="text" name="username" placeholder="Username" required pattern="^[a-zA-Z0-9-\_.]{5,16}$"/>
				 <font color="red" face="tahoma"><?php if(isset($_POST['registration'])){ if($username == "" ) {
                 $error1= "error : You did not enter the username name.";
                 echo $error1;
                 } }?></font>
				 
			</div>
			
                <div>
                    <input type="password" name="pass" placeholder="Password" required pattern="^[a-zA-Z0-9-\_.]{5,16}$"/>
				
                </div>
				
                <div>
                    <input type="text" name="email" placeholder="Email" required pattern="^[a-zA-Z0-9-\_.]+@[a-zA-Z0-9-\_.]+\.[a-zA-Z0-9.]{2,5}$"/><font color="red" face="tahoma">&nbsp;&nbsp;&nbsp;like name@something.com</font>
                </div>
				<div>
				 <input type="tel" name="usrtel" placeholder="Telephone" required pattern="[0-9]{10}"/><font color="red" face="tahoma">&nbsp;&nbsp;&nbsp;fill 10 digit number</font><br><br>
				 </div><br><br>
                Address<br>
				 <table id="address">
      <tr>
        <td class="label">Street</td>
        <td class="slimField"><input type="text" name="street"></input></td>
      </tr>
      <tr>
        <td class="label">City</td>
        <td class="wideField" colspan="3"><input type="text" name="city"></input></td>
      </tr>
      <tr>
        <td class="label">State</td>
        <td class="slimField"><input type="text" name="state"></input></td>
        <td class="label">Pin</td>
        <td class="wideField"><input type="text" name="pin_code"></input></td>
      </tr>
      <tr>
        <td class="label">Country</td>
        <td class="wideField" colspan="3"><input type="text" name="country"></input></td>
      </tr>
    </table>		
                <input type="submit" name="registration" value="register"/>
            </fieldset>
			
			<?php else: ?>
<?php endif;?>
</form>
</div>
</div>
</body>
</html>